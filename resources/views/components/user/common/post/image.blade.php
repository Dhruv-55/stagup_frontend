<div>
    <div id="HomePost">

    </div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
     @section("ajax-scripts")
<script>
              
const BaseURL = "{{ env('API_ROUTE_URL') }}";
const paramID = "{{ request()->route('id') ?? 0 }}";
const token = localStorage.getItem('auth_token');
$(document).ready(function() {
   
   function loadData(){
     $.ajax({
        url: BaseURL + "/home",
        headers: {
            'Authorization': 'Bearer ' + token
        },
        type: "GET",     
        success: function(response) {
            $("#HomePost").html("");
            if(response.data.length > 0){
            response.data.forEach(item => {
                let post =    
                    `<div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2 my-2 " >

                        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                            <a href="profile.html"> <img src="${ getImageUrl(item.user.profile?.profile_image) }" alt="" class="w-9 h-9 rounded-full"> </a>  
                            <div class="flex-1">
                                <a href="profile.html"> <h4 class="text-black dark:text-white"> ${item.user.username} </h4> </a>  
                                <div class="text-xs text-gray-500 dark:text-white/80"> ${humanizeDate(item.created_at)}</div>
                            </div>

                           
                        </div>
                        
                        <div class="relative w-full sm:px-4" style="height: 400px;">
                        <img src="${ item.image ? getImageUrl(item.image) : '/default.jpg' }" 
                            alt="" 
                            class="sm:rounded-lg w-full h-full object-cover"
                            style="height: 400px; object-fit: cover;">
                    </div>

                    
                        <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                            <div class="flex items-center gap-2.5">
                                <button type="button" onclick="likeOrDislike(${item.id})" class="button__ico ${item.is_liked ? 'text-red-500 bg-red-100' : 'text-gray-500 bg-gray-100'} dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                <a href="javascript:void(0);">${item.total_likes}</a>
                            </div>
                        </div>

                       

                    </div>`;
                $("#HomePost").append(post);
            })
            }else{
                $("#HomePost").append("No data found");
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
   }


    window.likeOrDislike = function(postId){
        $.ajax({
            url: BaseURL + "/general/likeOrDislike",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "POST",     
            data: {
                event_id: postId
            },
            success: function(response) {
               loadData();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    loadData();
});
</script>

@endsection
</div>


