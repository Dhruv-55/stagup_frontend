@extends('User.Template.layout')

@section('content')
  <!-- profile  -->
    <div class="py-6 relative">

        <div class="flex md:gap-16 gap-4 max-md:flex-col">
            <div class="relative md:p-1 rounded-full h-full max-md:w-16 bg-gradient-to-tr from-pink-400 to-pink-600 shadow-md hover:scale-110 duration-500 uk-animation-scale-up">
                <div class="relative md:w-40 md:h-40 h-16 w-16 rounded-full overflow-hidden md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900"> 
                    <img src="assets/images/avatars/avatar-6.jpg" id="img" alt="" class="w-full h-full absolute object-cover">
                </div>
                <button type="button" class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden"> <ion-icon name="camera" class="text-2xl"></ion-icon></button>
            </div>
            <div class="max-w-2x flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white" id="headingText"> NA </h3>
                    
                <p class="sm:text-sm text-blue-600 mt-1 font-normal text-xs" id="subHeadingText">@NA</p>
                
                <p class="text-sm mt-2 md:font-normal font-light" id="bio"> </p>

                <p class="mt-2 space-x-2 text-gray-500 text-sm hidden" style="margin-top: 11px; "><a href="profile.html#" class="inline-block">Travel</a> . <a href="profile.html#" class="inline-block">Business</a> . <a href="profile.html#" class="inline-block">Technolgy</a>  </p>
                
                <div class="flex md:items-end justify-between md:mt-8 mt-4 max-md:flex-col gap-4">
                    <div class="flex sm:gap-10 gap-6 sm:text-sm text-xs max-sm:absolute max-sm:top-10 max-sm:left-36">
                        <div>
                            <!-- <p>Posts</p>
                            <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal" id="posts">162</h3> -->
                        </div>
                        <div>
                            <a href="">
                                <p>Following</p>
                                <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal" id="following">0</h3>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <p>Followers</p>
                                <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal" id="followers">0</h3>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-sm" id="followSection">
                        <!-- <div> 
                            <button type="submit" class="rounded-lg bg-slate-200/60 flex px-2 py-1.5 dark:bg-dark2"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon></button>
                            <div  class="w-[240px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click;offset:10"> 
                                <nav>
                                    <a href="profile.html#"> <ion-icon class="text-xl" name="pricetags-outline"></ion-icon> Unfollow </a>  
                                    <a href="profile.html#"> <ion-icon class="text-xl" name="time-outline"></ion-icon>  Mute story </a>  
                                    <a href="profile.html#"> <ion-icon class="text-xl" name="flag-outline"></ion-icon>  Report </a>  
                                    <a href="profile.html#"> <ion-icon class="text-xl" name="share-outline"></ion-icon> Share profile </a>  
                                    <hr>
                                    <a href="profile.html#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl" name="stop-circle-outline"></ion-icon>  Block </a>  
                                </nav>
                            </div>
                        </div> -->
                    </div>
                </div>
            
            </div>
        </div>
        <x-user.common.profile.post />
    </div>

  
@endsection
@section("ajax-scripts")
<script>
            
    const BaseURL = "{{ env('API_ROUTE_URL') }}";
    const paramID = "{{ request()->route('id') ?? 0 }}";
    const token = localStorage.getItem('auth_token');
    $(document).ready(function() {
        
        

        function getData() {

            $.ajax({
                url: BaseURL + "/profile/data/" + paramID,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "GET",
                success: function(response) {
                    if(response.success){
                        if(response.data){
                            console.log(response.data);
                            $('#username').text(response.data.username);
                            $('#subHeadingText').text(response.data.username);
                            $('#bio').text(response.data.profile?.bio);
                            $('#display_name').text(response.data.profile?.display_name);
                            $('#headingText').text(response.data.profile?.display_name);
                            $("#followers").text(response.data.followers);
                            $("#following").text(response.data.following);
                            $("#posts").text(response.data.posts);

                            let userData = JSON.parse(localStorage.getItem('user_data'));
                            if(userData.id == response.data.id){
                               $("#followers").closest("a").attr("href", "/people/" );
                               $("#following").closest("a").attr("href", "/people/");
 
                            }else{
                                $("#followers").closest("a").attr("href", "/people/" + response.data.id);
                                 $("#following").closest("a").attr("href", "/people/" + response.data.id);

                            }

                            
                            if(response.data.id == parseInt(paramID)){
                                $("#followSection").css("display", "flex");
                                $("#followSection").html(`
                                    <button type="submit" class="button text-gray-600 bg-slate-200 ${response.data.is_follow ? 'hidden' : ''}" onclick="followUser(${response.data.id})">Follow</button>
                                    <button type="button" class="button bg-pink-100 text-pink-600 border border-pink-200 ${response.data.is_follow ? '' : 'hidden'}" onclick="unfollowUser(${response.data.id})">Unfollow</button>
                                    <button type="submit" class="button bg-pink-600 text-white ${response.data.is_follow ? '' : 'hidden'}">Message</button>
                                `);
                            }else{
                                $("#followSection").css("display", "none");
                            }

                            const imgUrl = response.data.profile?.profile_image ? getImageUrl(response.data.profile?.profile_image) : '/assets/images/avatars/avatar-1.jpg';
                                $('#img').attr('src', imgUrl);
                            // $("img").attr("src", response.data.profile?.profile_image);
                                if (!response.data.profile || !response.data.profile || !response.data.profile) {
                                //    getUserLocation(); 
                                }
                        }
                    }
                },
            });
        }

        getData();

        window.followUser = function(id){
            console.log(id);
            $.ajax({
                url: BaseURL + "/general/follow/",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    if(response.success){
                        getData();
                    }
                },
            });
        }
         window.unfollowUser = function(id){
            console.log(id);
            $.ajax({
                url: BaseURL + "/general/unfollow/",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    if(response.success){
                        getData();
                    }
                },
            });
        }
    })
     $(document).ready(function() {
        $.ajax({
            url: BaseURL + "/profile/posts/" + paramID,
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
               response.data.forEach(element => {
                   let post = `
                   <a href="javascript:void(0);">
                        <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100"> 
                            <div class="relative overflow-hidden rounded-lg uk-transition-toggle">
                                <div class="relative w-full lg:h-60 h-full aspect-[3/3]">
                                    <img src="${element.image ? getImageUrl(element.image) : '/assets/images/post/post-1.jpg'}" alt="" class="object-cover w-full h-full">
                                </div>
                                <div class="absolute inset-0 bg-white/5 backdrop-blur-sm uk-transition-fade">    
                                    <div class="flex items-center justify-center gap-4 text-white w-full h-full">
                                        <div class="flex items-center gap-2"> <ion-icon class="text-2xl" name="heart-circle"></ion-icon> 152</div>
                                        <div class="flex items-center gap-2"> <ion-icon class="text-2xl" name="chatbubble-ellipses"></ion-icon> 290</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>`;
                   $("#ProfilePostList").append(post);
               });
            },
            error: function(data) {
                
            }
        }); 
    });
</script>
@endsection