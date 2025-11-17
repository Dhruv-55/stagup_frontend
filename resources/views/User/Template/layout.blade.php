<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="/assets/logo.png" rel="icon" type="image/png">

    <!-- title and description-->
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ env('APP_SLOGAN') }}">
   
    <!-- css files -->
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <link rel="stylesheet" href="/assets/css/style.css">  
    <link rel="stylesheet" href="{{ asset('assets/common/css/toaster.css') }}">
    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
 
 <script>
  if (!localStorage.getItem('auth_token')) {
     window.location.href = "http://127.0.0.1:8000/";
  } else {
    // Optional backend validation (non-blocking)
    // fetch("http://127.0.0.1:8001/api/auth/check", {
    //   headers: { "Authorization": "Bearer " + localStorage.getItem('auth_token') }
    // })
    // .then(res => res.json())
    // .then(data => {
    //   if (!data.valid) window.location.href = "http://127.0.0.1:8000/";
    // })
  }
</script>
<style>
    #preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #000; /* optional background */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  overflow-y: hidden;
}

body.loading {
  overflow: hidden;
}

/* Hide when done */
.hidden {
  display: none !important;
}
</style>
</head>
<body>
@php
 $is_message_page = Route::currentRouteName() == 'message';

@endphp

    <div id="wrapper">

        <!-- sidebar -->
        @include('User.Template.sidebar')
        <!-- main contents -->
        <main class="2xl:ml-[--w-side] xl:ml-[--w-side-md] md:ml-[--w-side-small]">

            <div class="{{ !$is_message_page ? 'main__inner mb-10' : '' }}">
  
                <!-- stories -->

                @yield('content')

            </div> 

        </main>
        
    </div>

 
    <!-- create status -->
    <div class="hidden lg:p-20" id="create-status" uk-modal="">
   
        <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white p-7 shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="text-center py-3 border-b -m-7 mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium"> Create Status </h2>

                <!-- close button -->
                <button type="button" class="button__ico absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
     
            </div>
                    
            <div class="space-y-5 mt-7">

                <div> 
                    <label for="" class="text-base">What do you have in mind? </label>
                    <input type="text"  class="w-full mt-3">
                </div>

                <div>  
                    <div class="w-full h-72 relative border1 rounded-lg overflow-hidden bg-[url('../images/ad_pattern.png')] bg-repeat">
                    
                        <label for="createStatusUrl" class="flex flex-col justify-center items-center absolute -translate-x-1/2 left-1/2 bottom-0 z-10 w-full pb-6 pt-10 cursor-pointer bg-gradient-to-t from-gray-700/60">
                            <input id="createStatusUrl" type="file" class="hidden" />
                            <ion-icon name="image" class="text-3xl text-teal-600"></ion-icon>
                            <span class="text-white mt-2">Browse to Upload image </span>
                        </label>

                        <img id="createStatusImage" src="home.html#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;" class="w-full h-full absolute object-cover">

                    </div>

                </div>

                <div class="flex justify-between items-center">

                    <div class="flex items-start gap-2">
                        <ion-icon name="time-outline" class="text-3xl text-sky-600  rounded-full bg-blue-50 dark:bg-transparent"></ion-icon>
                        <p class="text-sm text-gray-500 font-medium"> Your Status will be available <br> for <span class="text-gray-800"> 24 Hours</span> </p>
                    </div>

                    <button type="button" class="button bg-blue-500 text-white px-8"> Create</button>

                </div>

            </div>
        
        </div>

    </div>

    
 
    <div id="preloader">
          <img src="/assets/preloader.svg" alt="Loading..." width="120">
    </div>
    <!-- Uikit js you can use cdn  https://getuikit.com/docs/installation  or fine the latest  https://getuikit.com/docs/installation -->
    <script src="/assets/js/uikit.min.js"></script>
    <script src="/assets/js/script.js"></script>

    <!-- Ion icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>

    //       window.AuthMiddleware = function(){
    //     if(localStorage.getItem('auth_token') == null){
    //         window.location.href = "/";
    //     }
    // }
    // AuthMiddleware();
     
        // Modern Toast Notification Function
        function customToast(message, type = 'success') {
            $('.custom-toast').addClass('toast-exit');
            setTimeout(() => $('.custom-toast').remove(), 2000);
            
            const config = {
                success: {
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>',
                    title: 'Success'
                },
                error: {
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" /></svg>',
                    title: 'Error'
                },
                info: {
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>',
                    title: 'Info'
                },
                warning: {
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>',
                    title: 'Warning'
                }
            };
            
            const current = config[type] || config.info;
            
            const toast = $(`
                <div class="custom-toast toast-${type}">
                    <div class="toast-glow"></div>
                    <div class="toast-content">
                        <div class="toast-icon-wrapper">
                            <div class="toast-icon">${current.icon}</div>
                            <div class="toast-icon-pulse"></div>
                        </div>
                        <div class="toast-text">
                            <div class="toast-title">${current.title}</div>
                            <div class="toast-message">${message}</div>
                        </div>
                        <button class="toast-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.225 4.811a1 1 0 00-1.414 1.414L10.586 12 4.81 17.775a1 1 0 101.414 1.414L12 13.414l5.775 5.775a1 1 0 001.414-1.414L13.414 12l5.775-5.775a1 1 0 00-1.414-1.414L12 10.586 6.225 4.81z"/></svg>
                        </button>
                    </div>
                    <div class="toast-progress"></div>
                </div>
            `);
            
            toast.find('.toast-close').on('click', function() {
                toast.addClass('toast-exit');
                setTimeout(() => toast.remove(), 300);
            });
            
            $('body').append(toast);
            
            setTimeout(() => {
                if (toast.is(':visible')) {
                    toast.addClass('toast-exit');
                    setTimeout(() => toast.remove(), 300);
                }
            }, 4000);
        }
         function getImageUrl(path) {
                if (!path) return "assets/default.png"; // fallback avatar

                // If already full URL (e.g., starts with http)
                if (path.startsWith('http')) return path;

                // If stored in Laravel's public storage folder
                return "{{ url('storage') }}/" + path.replace(/^public\//, '');
            }
             function getUserLocation() {
                    fetch("https://ipinfo.io/json?token=c72ee69f4cae46")
                    .then((response) => response.json())
                    .then((data) => {

                        // Autofill the form fields
                        document.getElementById("city").value = data.city || '';
                        document.getElementById("state").value = data.region || '';
                    })
                    .catch((error) => {
                        console.error("Failed to fetch location data:", error);
                    });
                }
                 function humanizeDate(dateString) {
                    const date = new Date(dateString);
                    const now = new Date();
                    const diff = now - date;
                    const seconds = Math.floor(diff / 1000);
                    const minutes = Math.floor(seconds / 60);
                    const hours = Math.floor(minutes / 60);
                    const days = Math.floor(hours / 24);
                    const months = Math.floor(days / 30);
                    const years = Math.floor(days / 365);
                    
                    if (years > 0) return `${years} year${years === 1 ? '' : 's'}`;
                    if (months > 0) return `${months} month${months === 1 ? '' : 's'}`;
                    if (days > 0) return `${days} day${days === 1 ? '' : 's'}`;
                    if (hours > 0) return `${hours} hour${hours === 1 ? '' : 's'}`;
                    if (minutes > 0) return `${minutes} minute${minutes === 1 ? '' : 's'}`;
                    return `${seconds} second${seconds === 1 ? '' : 's'}`;
                }
    </script>   
     <script>
             
    const MainURL = "{{ env('API_ROUTE_URL') }}";
    const MainToken = localStorage.getItem('auth_token');
    $(document).ready(function() {
       $("#MainSearch").on('input', function() {
           $.ajax({
                url: MainURL + "/general/search-user",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                type: "GET",
                data: {
                    search: $("#MainSearch").val()
                },
                success: function(response) {
                   let html="";
                //    console.log(response.data);
                   if(response.data.length==0){
                      html ="<p style='text-align:center'>No Result Found</p>";  
                   }else{
                    response.data.forEach(element => {
                       html+=`
                       <a href="/profile/${element.id}" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <img src="${getImageUrl(element.profile?.profile_image) ?? '/assets/default.png'}" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            <div class="fldex-1 min-w-0">
                                <h4 class="font-medium text-sm text-black dark:text-white">  ${element.username} </h4>
                                <div class="text-xs text-gray-500 font-normal mt-0.5 dark:text-white-80"> Suggested For You </div>
                            </div> 
                        </a>
                   `;
                   });
                 
                }
                  $("#searchResults").html(html);
                },
                error: function(error) {
                    console.log(error);
                }
            });
            
       })

       function getUserData(){
        $.ajax({
            url: MainURL + "/profile/data",
            headers: {
                'Authorization': 'Bearer ' + MainToken
            },
            type: "GET",
            success: function(response) {
                if(response.success){
                    
                    localStorage.removeItem('user_data');
                    localStorage.setItem('user_data', JSON.stringify(response.data));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
       }
       getUserData();
        let userData = localStorage.getItem('user_data');
        userData = JSON.parse(userData);
        // console.log(userData);

        // $('#SidebarDropImage').attr('src', localStorage.getItem('user').); 
        $('#SidebarHeading').text(userData.profile?.display_name); 
        $('#SidebarDropHeading').text(userData.username); 
        $('#SidebarDropSubHeading').text(userData.username); 
        $('#SidebarDropImage').attr('src', getImageUrl(userData.profile?.profile_image) || '/assets/default.png'); 
        $('#SidebarImage').attr('src', userData.profile?.profile_image ? getImageUrl(userData.profile?.profile_image) : '/assets/default.png'); 
        // $('#SidebarDropFollowing').text(userData.profile?.following); 
        // $('#SidebarDropFollowers').text(userData.profile?.followers); 
        console.log(userData.role_type)
        if(userData.role_type!=="organizer"){
            $('#venues').css('display','none');
        }else{
            $('#venues').css('display','flex');
        }


        window.logout = function(){
            $.ajax({
                url: MainURL + "/auth/logout",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                type: "GET",
                success: function(response) {
                    if(response.success){
                        localStorage.removeItem('auth_token');
                        localStorage.removeItem('user_data');
                        window.location.href = "/";
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
       } 
    
    });
  
 
    $(document).ready(function() {

    setTimeout(function() {
            $('#preloader').fadeOut(500, function() {
                $('body').removeClass('loading'); // allow scroll again
                $('#content').fadeIn(500);
            });
        }, 2000);
    });
  </script>  
<script>
    $.ajaxSetup({
        beforeSend: function (xhr) {
            const loc = localStorage.getItem("user_location");
            if (loc) {
                xhr.setRequestHeader('X-User-Location', loc);
            }
        }
    });
</script> 
 @yield('ajax-scripts')
</body>
</html>