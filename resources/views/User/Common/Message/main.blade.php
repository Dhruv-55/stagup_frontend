@extends('User.Template.layout')

@section('content')
   <div class="flex bg-white dark:bg-dark2">

            <!-- sidebar -->
            @include('User.Common.Message.sidebar')

            <!-- message center -->
            <div class="flex-1">

                <!-- chat heading -->
                @include('User.Common.Message.heading')
                    
                <!-- chats bubble -->
                @include('User.Common.Message.chat')

                <!-- sending message area -->
                @include('User.Common.Message.send')

            </div>

            <!-- user profile right info -->
            @include('User.Common.Message.profile-right')
            
        </div>

@endsection
@section('ajax-scripts')
<script>
    $(document).ready(function(){
       function userSearch(){
         $.ajax({
            url: MainURL + "/message/search",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + MainToken
            },
            data: {
                search: $("#MessagePageSearch").val()
            },
            success: function(response){
                let html = "";
               response.data.forEach(element => {
                   html += `
                   <a href="messages.html#" class="relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-14 h-14 shrink-0"> 
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="object-cover w-full h-full rounded-full">
                                <div class="w-4 h-4 absolute bottom-0 right-0  bg-green-500 rounded-full border border-white dark:border-slate-800"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="mr-auto text-sm text-black dark:text-white font-medium">${element.profile?.display_name || element.username}</div>
                                    <div class="text-xs font-light text-gray-500 dark:text-white/70">${ element.last_message?.created_at ? humanizeDate(element.last_message?.created_at) : ""}</div> 
                                </div>
                                <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap">${element.last_message?.message || ""}</div>
                            </div>
                        </a>
                   `;
               });
               $("#MessageUserList").html(html);
            }
        })
       }
       $("#MessagePageSearch").on("input", function(){
           userSearch();
       })
       userSearch();
    })
</script>
@endsection
