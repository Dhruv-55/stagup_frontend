<div id="sidebar" class="fixed top-0 left-0 z-40 max-md:top-auto max-md:bottom-0">

            <div id="sidebar__inner" class="flex sside md:flex-col justify-between md:h-screen md:p-2 p-1 transition-all duration-500 bg-white shadow dark:bg-dark2 2xl:w-72 xl:w-60 max-xl:w-[73px] max-md:w-screen max-md:border-t max-md:dark:border-slate-700">

                <!-- logo -->
                <div class="flex h-20 px-2 max-md:fixed max-md:top-0 max-md:w-full max-md:bg-white/80 max-md:left-0 max-md:px-4 max-md:h-14 max-md:shadow-sm max-md:dark:bg-slate-900/80 backdrop-blur-xl">
                    <a href="{{ route('home') }}" id="logo" class="flex items-center gap-3">

                        <!-- logo icon -->
                        <img id="logo__icon" src="/assets/images/logo-icon.png" alt="" class="md:w-8 hidden text-2xl max-xl:!block max-md:!hidden shrink-0 uk-animation-scale-up"> 

                        <!-- text logo -->
                        <!-- <img id="logo__text" src="assets/images/logo.svg" alt="" class="w-full h-6 ml-1 max-xl:hidden max-md:block dark:!hidden"> -->
                        <img id="logo__text" src="/assets/images/logo-dark.svg" alt="" class="w-full h-6 ml-1 !hidden max-xl:!hidden max-md:block dark:max-md:!block dark:!block">
                      
                    </a>
                </div>

                <!-- nav -->
                <nav class="flex-1 max-md:flex max-md:justify-around md:space-y-2">

                    <!-- Home -->
                    <a href="{{ route('home') }}" class="active">
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                        </svg>
                        <span class="max-xl:hidden"> Home </span>
                    </a>
                
                    <!-- Search -->
                    <a href="home.html#!">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <span class="max-xl:hidden"> Search </span>
                    </a>  
                    <div class="sm:w-[397px] w-full bg-white shadow-lg md:!left-[73px] hidden !left-0 dark:bg-dark2 dark:border1 max-md:bottom-[57px]" uk-drop="animation: uk-animation-slide-left-small , uk-transform-origin-center-left ;animate-out: true; pos: left ; mode:click; offset: 9"> 
                        <div class="md:h-screen overflow-y-auto h-[calc(100vh-120px)]">

                            <!-- header -->
                            <div class="px-5 py-4 space-y-5 border-b border-gray-100 dark:border-slate-700">
                                <h3 class="md:text-xl text-lg font-medium mt-3 text-black dark:text-white">Search</h3>

                                <div class="relative -mx-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-3 bottom-1/2 translate-y-1/2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                    <input type="text" placeholder="Search" id="MainSearch" class="bg-transparen w-full !pl-10 !py-2 !rounded-lg">
                                </div>

                            </div>

                            <!-- contents list -->
                            <div class="p-2 space-y-2 dark:text-white">

                                <div class="flex items-center justify-between py-2.5 px-3 font-semibold">
                                    <h4>Recent</h4>
                                    <button type="button"class="text-blue-500 text-sm">Clear all</button>
                                </div>

                                <div id="searchResults">
                                    
                                    <!-- <a href="{{ route('profile') }}" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                                        <img src="assets/images/avatars/avatar-2.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                                        <div class="fldex-1 min-w-0">
                                            <h4 class="font-medium text-sm text-black dark:text-white">  Johnson smith </h4>
                                            <div class="text-xs text-gray-500 font-normal mt-0.5 dark:text-white-80"> Suggested For You </div>
                                        </div> 
                                     </a> -->
                                </div>
                                

                            </div>

                        </div>
                    </div> 

                    <!-- Explore -->
                    <a href="{{ route('explore') }}" class="max-md:!hidden">
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-compass" viewBox="0 0 16 16">
                            <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
                        </svg> 
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M13.5 4.938a7 7 0 11-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 01.572-2.759 6.026 6.026 0 012.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0013.5 4.938zM14 12a4 4 0 01-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 001.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 011.315-4.192.447.447 0 01.431-.16A4.001 4.001 0 0114 12z" clip-rule="evenodd" />
                        </svg>
                        <span  class="max-xl:hidden"> Explore </span>
                    </a>  

                    <!-- marketplace -->
                    <a href="{{ route('message') }}"  class="max-md:!fixed max-md:top-2 max-md:right-2 active">
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z" clip-rule="evenodd"></path>
                        </svg>
                        <span  class="max-xl:hidden"> Messages </span>
                    </a>
                    <!-- peaple -->
                    
                    
                    <!-- create a post -->
                    <a href="{{ route('event') }}">
                        <button uk-toggle="target: #create-post" uk-toggle="" class="flex items-center gap-3 w-full">
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                        </svg>
                        <span  class="max-xl:hidden"> Create </span></button>
                    </a>
                    
                       
                    <a href="{{ route('profile') }}" class="max-md:!hidden">
                        
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                        <span  class="max-xl:hidden"> Profile </span>
                    </a>
 
                     <a href="{{ route('venues') }}" class="max-md:!hidden" id="venues">
                        
                        <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                        <span  class="max-xl:hidden"> Venues </span>
                    </a>
                </nav>

                <!-- profile -->
                <div >
                    <a id="profile-link" class="flex items-center gap-3 p-3 group">
                        <img id="SidebarImage" src="/assets/images/avatars/avatar-7.jpg" alt="" class="rounded-full md:w-7 md:h-7 w-5 h-5 shrink-0">
                        <span class="font-semibold text-sm max-xl:hidden" id="SidebarHeading">  NA </span>
                        <ion-icon name="chevron-forward-outline"  class="text-xl ml-auto duration-200 group-aria-expanded:-rotate-90 max-xl:hidden"></ion-icon>
                    </a>
                    <div class="bg-white sm:w-64 2xl:w-[calc(100%-16px)] w-full shadow-lg border rounded-xl overflow-hidden max-md:!top-auto max-md:bottom-16 border2 dark:bg-dark2 hidden" uk-drop="animation:uk-animation-slide-bottom-medium ;animate-out: true">

                        <div class="w-full h-1.5 bg-gradient-to-r to-purple-500 via-red-500 from-pink-500"></div>
 
                        <div class="p-4 text-xs font-medium">
                            <a href="{{ route('profile') }}">
                                <img id="SidebarDropImage" src="/assets/images/avatars/avatar-3.jpg" class="w-8 h-8 rounded-full" alt="">
                                <div class="mt-2 space-y-0.5">
                                    <div class="text-base font-semibold" id="SidebarDropHeading"> NA </div>
                                    <div class="text-gray-400 dark:text-white/80" id="SidebarDropSubHeading"> @NA </div>
                                </div>
                            </a>
                            <!-- <div class="mt-3 flex gap-3.5">
                                <div> <a href="{{ route('profile') }}" > <strong id="SidebarDropFollowing"> 620K </strong> <span class="text-gray-400 dark:text-white/80 ml-1">Following </span> </a> </div>
                                <div> <a href="{{ route('profile') }}" > <strong id="SidebarDropFollowers"> 38k </strong> <span class="text-gray-400 dark:text-white/80 ml-1">Followers </span> </a>  </div>
                            </div> -->
                                
                        </div>
                        <hr class="opacity-60">
                        <ul class="text-sm font-semibold p-2">
                            <li> <a href="{{ route('profile') }}" class="flex gap-3 rounded-md p-2 hover:bg-secondery"> <ion-icon name="person-outline" class="text-lg"></ion-icon> Profile     </a></li>
                            <li> <a href="upgrade.html" class="flex gap-3 rounded-md p-2 hover:bg-secondery"> <ion-icon name="bookmark-outline" class="text-lg"></ion-icon> Upgrade </a></li> 
                            <li> <a href="{{ route('profile-setting') }}" class="flex gap-3 rounded-md p-2 hover:bg-secondery"> <ion-icon name="settings-outline" class="text-lg"></ion-icon> Acount Setting  </a></li>
                            <li> <a href="javascript:void(0)" onclick="logout()" class="flex gap-3 rounded-md p-2 hover:bg-secondery"> <ion-icon name="log-out-outline" class="text-lg"></ion-icon> Log Out</a></li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

 