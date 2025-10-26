@extends('User.Template.layout')

@section('content')
<div class="max-w-3xl p-6 mx-auto">

                <!-- heading title -->
                <div class="page__heading">
                    <a href="peaple.html#">
                        <ion-icon name="chevron-back-outline"></ion-icon> Back
                    </a>
                    <h1> People</h1>
                </div>

                <!-- tabs -->

                <nav class="border-b dark:border-slate-700" uk-sticky="cls-active: bg-slate-100/60 z-30 backdrop-blur-lg px-4 ;  animation: uk-animation-slide-top">
                  
                    <ul uk-tab class="flex gap-5 text-sm text-center text-gray-600 capitalize font-semibold -mb-px dark:text-white/80"  
                        uk-switcher="connect: #ttabs ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"> 
                       
                       <li> <a href="peaple.html#" class="inline-block py-5 border-b-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> followers 2,640 </a> </li>
                       <li> <a href="peaple.html#" class="inline-block py-5 border-b-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> following 1,420 </a> </li>
                        @if(!request()->route('id'))
                        <li> <a href="peaple.html#" class="inline-block py-5 border-b-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> Suggestions </a> </li>
                        @endif                   
                   </ul> 
                </nav>

                <div class="uk-switcher mt-10" id="ttabs">
      
                    
                    <!-- list  One -->
                    <div>

                        <div class="grid sm:grid-cols-2 gap-2 mt-5 mb-2 text-xs font-normal text-gray-500 dark:text-white/80" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100" id="PeopleFollowers">

                           


                        </div>

                        <!-- <div class="flex justify-center my-10">
                            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
                        </div> -->

                    </div>


                    <!-- list Two -->
                    <div>
                  
                        <div class="space-y-6 text-sm font-normal text-gray-500" uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 100 " id="PeopleFollowing">
  
                           
  


                        </div>

                        <!-- <div class="flex justify-center my-10">
                            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
                        </div> -->

                    </div>


                    <!-- list Three -->
                    <div>
                  
                        <div class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-4 text-xs font-normal text-gray-500 dark:text-white/80" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100" id="PeopleSuggestions">

    
                        </div>

                        <!-- <div class="flex justify-center my-10">
                            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
                        </div> -->

                    </div>


                     

                </div>  

             
            </div>
@endsection
@section('ajax-scripts')
<script>
    const BaseURL = "{{ env('API_ROUTE_URL') }}";
    const paramID = "{{ request()->route('id') ?? ""}}";
    const token = localStorage.getItem('auth_token');
    $(document).ready(function(){
        function loadFollowerws(){
               $.ajax({
                url: BaseURL + '/profile/followers/'+paramID,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                success: function(response){
                 let html = '';
                 if(response.data.length > 0){
                    response.data.forEach(element => {
                        console.log(element.user?.is_follow)
                        html += `
                            <div class="bg-white flex gap-4 items-center flex-wrap justify-between p-5 rounded-lg shadow-sm border1 dark:bg-dark2">
                                <a href="/profile/${element?.id}">
                                    <img src="${element?.profile?.profile_image ? getImageUrl(element?.profile?.profile_image) : '/assets/images/avatars/avatar-1.jpg'}" alt="" class="rounded-full lg:w-16 lg:h-16 w-10 h-10">
                                </a>
                                <div class="flex-1">
                                    <a href="/profile/${element?.id}"><h4 class="font-semibold text-sm text-black dark:text-white"> ${element.user?.username}</h4> </a>
                                    <div class="mt-0.5"> ${element.user?.followers} following </div>
                                </div>
                                <button type="button" onclick="followUser(${element?.id})" class=" button bg-secondery rounded-full py-1.5 font-semibold  ${element.user?.is_follow ? 'hidden' : ''}">Fallow</button>
                            </div>
                        `;
                    });
                    $('#PeopleFollowers').html(html);
                }else{
                    $('#PeopleFollowers').html('<p>No followers found</p>');
                }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
        function loadFollowing(){
            $.ajax({
                url: BaseURL + '/profile/following/'+paramID,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                success: function(response){
                   let html = "";
                   if(response.data.length > 0){
                    response.data.forEach(element => {
                        html += `
                            <div class="bg-white flex gap-4 items-center flex-wrap justify-between p-5 rounded-lg shadow-sm border1 dark:bg-dark2">
                                <a href="/profile/${element.user.id}">
                                    <img src="${element.user.profile?.profile_image || '/assets/images/avatars/avatar-1.jpg'}" alt="" class="rounded-full lg:w-16 lg:h-16 w-10 h-10">
                                </a>
                                <div class="flex-1">
                                    <a href="/profile/${element.user.id}"><h4 class="font-semibold text-sm text-black dark:text-white">${element.user.username}</h4> </a>
                                    <div class="mt-0.5"> ${element.user.followers} following </div>
                                </div>

                            </div>
                        `;
                    });
                $('#PeopleFollowing').html(html);
                }else{
                    $('#PeopleFollowing').html('<p>No following found</p>');
                }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
        function loadSuggestions(){
            $.ajax({
                url: BaseURL + '/profile/suggestions',
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                success: function(response){
                    let html = "";
                    if(response.data.length > 0){
                        response.data.forEach(element => {
                            html += `
                                <div class="flex flex-col items-center shadow-sm p-2 rounded-xl bg-white border1 dark:bg-dark2">
                                    <a href="profile/${element?.id}">
                                        <div class="relative w-20 h-20 mx-auto mt-3">
                                            <img src="${element.profile?.profile_image || '/assets/images/avatars/avatar-1.jpg'}" alt="" class="h-full object-cover rounded-full shadow w-full">
                                        </div>
                                    </a>
                                    <div class="mt-5 text-center w-full">
                                        <a href="profile/${element?.id}"> <h4 class="font-semibold text-sm text-black dark:text-white"> ${element?.username}</h4> </a>
                                        <div class="mt-1"> ${element?.followers} Followers</div>
                                        <button type="button" onclick="followUser(${element?.id})" class="block font-semibold mt-4 py-1.5 rounded-lg text-[13px] w-full bg-slate-100/70 dark:bg-slate-700"> Follow </button>
                                    </div>
                                </div>
                            `;
                        });
                        $('#PeopleSuggestions').html(html);
                    }else{
                        $('#PeopleSuggestions').html('<p>No suggestions found</p>');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
        loadFollowerws();
        loadFollowing();
        loadSuggestions();


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
                        loadSuggestions();
                        loadFollowing();
                        loadFollowerws();
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
                        loadSuggestions();
                        loadFollowing();
                        loadFollowerws();
                    }
                },
            });
        }
    }); 
</script>
@endsection