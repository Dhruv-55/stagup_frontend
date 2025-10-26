@extends('User.Template.layout')
@section('content')
<div class="max-w-2xl mx-auto">
    @php 
        $previousUrl = url()->previous();
    @endphp
    <!-- heading title -->
    <div class="page__heading py-6 mt-6">
        <a href="{{ $previousUrl }}">
            <ion-icon name="chevron-back-outline"></ion-icon> Back
        </a>
        <h1> Settings </h1>
    </div>
    
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 dark:bg-dark2">
        
        <div class="flex md:gap-8 gap-4 items-center md:p-10 p-6">


            <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0"> 

                <label for="file" class="cursor-pointer">
                    <img id="img" src="assets/images/avatars/avatar-3.jpg" class="object-cover w-full h-full rounded-full" alt=""/>
                    <input id="file" accept="image/*" type="file" class="hidden" />
                     <!-- <input type="file" id="avatar_file" name="avatar" class="hidden" /> -->

                </label>

                <label for="file" class="md:p-1 p-0.5 rounded-full bg-slate-600 md:border-4 border-white absolute -bottom-2 -right-2 cursor-pointer dark:border-slate-700">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:w-4 md:h-4 w-3 h-3 fill-white">
                        <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                        <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                    </svg>

                    <!-- <input id="file" accept="image/*" type="file" class="hidden" /> -->

                </label>

            </div>

            <div class="flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white" id="headingText">NA  </h3>
                <p class="text-sm text-blue-600 mt-1 font-normal" id="subHeadingText">NA</p>
            </div>

        </div>
            
        <hr class="border-t border-gray-100 dark:border-slate-700">
        
        <!-- nav tabs -->
        <div class="relative -mb-px px-2" tabindex="-1" uk-slider="finite: true">

            <nav class="overflow-hidden rounded-xl uk-slider-container pt-2">
    
                <ul class="uk-slider-items w-[calc(100%+10px)] capitalize font-semibold text-gray-500 text-sm dark:text-white" 
                    uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"> 
                    
                    <li class="w-auto pr-2.5"> <a href="setting.html#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> General </a> </li>
                    <li class="w-auto pr-2.5"> <a href="setting.html#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> social links</a> </li>
                   
                </ul>
            
            </nav>
                    
            <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2.5 justify-start rounded-xl bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="setting.html#" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon> </a>
            <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2.5 justify-end rounded-xl bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="setting.html#" uk-slider-item="next">  <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon> </a>
        
        </div>

    </div>

    <!-- tab content -->
    <div class="mt-6 mb-20 text-sm font-medium text-gray-600 dark:text-white/80">

        <div id="setting_tab" class="uk-switcher bg-white border rounded-xl shadow-sm md:py-12 md:px-20 p-6 overflow-hidden dark:border-slate-700 dark:bg-dark2"> 
            

            <!-- tab user basic info -->
            <div>

                <div>
                    
                    <div class="space-y-6">

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> Username </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="username" id="username" class="lg:w-1/2 w-full" disabled>
                            </div>
                        </div>
                        
                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> Email </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="email" name="email" id="email" class="w-full" disabled>
                            </div>
                        </div> 

                        <div class="md:flex items-start gap-10">
                            <label class="md:w-32 text-right"> Bio </label>
                            <div class="flex-1 max-md:mt-4">
                                <textarea name="bio" id="bio" class="w-full" rows="5" ></textarea>
                            </div>
                        </div> 

                         <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> Display Name </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="display_name" id="display_name" class=" w-full">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> City </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="city" id="city" class="w-full">
                            </div>
                        </div>

                        <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> State </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="state" id="state" class="w-full">
                            </div>
                        </div>

                        <!-- <div class="md:flex items-center gap-10">
                            <label class="md:w-32 text-right"> Country </label>
                            <div class="flex-1 max-md:mt-4">
                                <input type="text" name="country" id="country" class="w-full">
                            </div>
                        </div> -->

                        <div class="md:flex items-start gap-10 " hidden>
                            <label class="md:w-32 text-right"> Avatar </label>
                            <div class="flex-1 flex items-center gap-5 max-md:mt-4">
                                <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-10 h-10 rounded-full">
                                <button type="submit" class="px-4 py-1 rounded-full bg-slate-100/60 border dark:bg-slate-700 dark:border-slate-600 dark:text-white"> Change</button>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="flex items-center justify-center gap-4 mt-16">
                        <button type="submit" class="button lg:px-6 bg-secondery max-md:flex-1"> Cancle</button>
                        <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1"> Save <span class="ripple-overlay"></span></button>
                    </div> -->
                    
                </div> 

            </div>

            <!-- tab socialinks -->   
            <div>

                <div>

                    <div class="font-normal text-gray-400">
                    
                        <div>
                            <h4 class="text-xl font-medium text-black dark:text-white"> Social Links </h4>
                            <p class="mt-3 font-normal text-gray-600 dark:text-white">We may still send you important notifications about your account and content outside of you preferred notivications settings</p>
                        </div>

                        <div class="space-y-6 mt-8">

                            <div class="flex items-center gap-3">
                                <div class="bg-blue-50 rounded-full p-2 flex ">
                                    <ion-icon name="logo-facebook" class="text-2xl text-blue-600"></ion-icon> 
                                </div>
                                <div class="flex-1">
                                    <input type="text" name="facebook" id="facebook" class="w-full" >
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="bg-pink-50 rounded-full p-2 flex ">
                                    <ion-icon name="logo-instagram" class="text-2xl text-pink-600"></ion-icon> 
                                </div>
                                <div class="flex-1">
                                    <input type="text" name="instagram" id="instagram" class="w-full" >
                                </div>
                            </div>
                            
                           
                        </div> 
                        
                    </div> 
                    
                   

                </div>

            </div>

        </div>
         <div class="flex items-center justify-center gap-4 mt-16">
            <button type="submit" class="button lg:px-6 bg-secondery max-md:flex-1"> Cancle</button>
            <button type="submit" id="settingSubmit" class="button lg:px-10 bg-primary text-white max-md:flex-1"> Save</button>
        </div>
    </div>

</div> 
@stop
@section('ajax-scripts')
    <script>
        
    const URL = "{{ env('API_ROUTE_URL') }}";
    const token = localStorage.getItem('auth_token');
            $(document).ready(function() {
                function getData() {
                    $.ajax({
                        url: URL + "/profile/index",
                       headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        type: "GET",
                        success: function(response) {
                            if(response.success){
                                if(response.data){
                                    console.log(response.data);
                                    $('#username').val(response.data.username);
                                    $('#subHeadingText').text(response.data.username);
                                    $('#email').val(response.data.email);
                                    $('#display_name').val(response.data.profile?.display_name);
                                    $('#headingText').text(response.data.profile?.display_name);

                                    $('#city').val(response.data.profile?.city);
                                    $('#state').val(response.data.profile?.state);
                                    $('#country').val(response.data.profile?.country);
                                    $('#bio').val(response.data.profile?.bio);
                                    $('#facebook').val(response.data.profile?.facebook);
                                    $('#instagram').val(response.data.profile?.instagram);
                                    const imgUrl = getImageUrl(response.data.profile?.profile_image);
                                            $('#img').attr('src', imgUrl);
                                    // $("img").attr("src", response.data.profile?.profile_image);
                                    console.log(response.data.profile);
                                     if (!response.data.profile || !response.data.profile || !response.data.profile) {
                                        getUserLocation(); 
                                     }
                                }
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }

                getData();

                function getImageUrl(path) {
                if (!path) return "assets/images/avatars/avatar-3.jpg"; // fallback avatar

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

                $('#settingSubmit').click(function(e) {
                    e.preventDefault();

                    const formData = new FormData();

                    // Append text inputs
                    formData.append("display_name", $('#display_name').val());
                    formData.append("city", $('#city').val());
                    formData.append("state", $('#state').val());
                    formData.append("bio", $('#bio').val());
                    formData.append("facebook", $('#facebook').val());
                    formData.append("instagram", $('#instagram').val());

                    // Append file input (if file selected)
                    const fileInput = $('#file')[0];
                    if (fileInput.files.length > 0) {
                        formData.append("avatar", fileInput.files[0]);
                    }

                    $.ajax({
                        url: URL + "/profile/update",
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                // alert("Profile updated successfully!");

                                // Optionally update avatar image preview
                                if (response.data?.avatar_url) {
                                    $('#img').attr('src', response.data.avatar_url);
                                }

                                getData(); // refresh form
                            } else {
                                // alert("Update failed.");
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            // alert("Error during update.");
                        }
                    });
                });

            });
    </script>
@endsection
