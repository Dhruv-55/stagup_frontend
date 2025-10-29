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
                console.log(response);
            }
        })
       }
       $("#MessagePageSearch").on("input", function(){
           userSearch();
       })
    })
</script>
@endsection
