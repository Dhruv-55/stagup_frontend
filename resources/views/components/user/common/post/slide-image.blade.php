<div>
    <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                            <!-- post heading -->
                            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                <a href="profile.html"> <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-9 h-9 rounded-full"> </a>
                                <div class="flex-1">
                                    <a href="profile.html"> <h4 class="text-black dark:text-white"> Martin Gray </h4> </a>
                                    <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                                </div>

                                <div class="-mr-1">
                                    <button type="button" class="button__ico w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                    <div  class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click"> 
                                        <nav> 
                                            <a href="home.html#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon>  Add to favorites </a>  
                                            <a href="home.html#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification </a>  
                                            <a href="home.html#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report this post </a>  
                                            <a href="home.html#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share your profile </a>  
                                            <hr>
                                            <a href="home.html#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>  Unfollow </a>  
                                        </nav>
                                    </div>
                                </div>
                            </div>
                             
                            <!-- slide images -->
                            <div class="relative uk-visible-toggle sm:px-4" tabindex="-1" uk-slideshow="animation: push;finite: true;min-height: 200; max-height: 250">

                                <ul class="uk-slideshow-items" uk-lightbox=""> 
                                    <li class="w-full overflow-hidden sm:rounded-md">
                                        <a href="assets/images/avatars/avatar-lg-3.jpg"  data-caption="Caption">
                                            <img src="assets/images/avatars/avatar-lg-2.jpg" class="w-full h-full object-cover inset-0" alt="">
                                        </a>
                                    </li>
                                    <li class="w-full overflow-hidden sm:rounded-md">
                                        <a href="assets/images/avatars/avatar-lg-3.jpg"  data-caption="Caption">
                                            <img src="assets/images/avatars/avatar-lg-3.jpg" class="w-full h-full object-cover inset-0" alt="">
                                        </a>
                                    </li>
                                     
                                </ul>
                                
                                <!-- navigation -->
                                <button type="button" class="absolute left-2 -translate-y-1/2 bg-black/40 backdrop-blur-3xl rounded-full top-1/2 grid w-7 h-7 place-items-center shadow" uk-slideshow-item="previous"> <ion-icon name="chevron-back" class="text-xl text-white"></ion-icon></button>
                                <button type="button" class="absolute right-2 -translate-y-1/2 bg-black/40 backdrop-blur-3xl rounded-full top-1/2 grid w-7 h-7 place-items-center shadow" uk-slideshow-item="next"> <ion-icon name="chevron-forward" class="text-xl text-white"></ion-icon></button>
                                
                            </div>

                            <!-- post icons -->
                            <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                <div class="flex items-center gap-2.5">
                                    <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                    <a href="home.html#">1,280</a>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button type="button" class="button__ico bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                    <span>638</span>
                                </div>
                                <button type="button" class="button__ico ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                                <button type="button" class="button__ico"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
                            </div>

                            <!-- comments -->
                            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40"> 
                        
                                <div class="flex items-start gap-3 relative">
                                    <a href="profile.html"> <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="profile.html" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                        <p class="mt-0.5"> Wow, You are so talented and creative. 😍 </p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 relative">
                                    <a href="profile.html"> <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="profile.html" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                        <p class="mt-0.5"> This photo is amazing! 😍 </p>
                                    </div>
                                </div>

                                <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                                    <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                                    More Comment
                                </button>

                            </div>

                            <!-- add comment -->
                            <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                                
                                <img src="assets/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">
                                
                                <div class="flex-1 relative overflow-hidden h-10">
                                    <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                                    <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                                        <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                                <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                            </svg>
                                        </div>
                                    </div>
                                    

                                </div>
                                

                                <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Replay</button>
                            </div> 

                        </div>

</div>