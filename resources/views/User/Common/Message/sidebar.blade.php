 <div class="md:w-[360px] relative border-r dark:border-slate-700">

                <div id="side-chat" class="top-0 left-0 max-md:fixed max-md:w-5/6 max-md:h-screen bg-white z-50 max-md:shadow max-md:-translate-x-full dark:bg-dark2">

                    <!-- heading title -->
                    <div class="p-4 border-b dark:border-slate-700">
                        
                        <div class="flex mt-2 items-center justify-between">

                            <h2 class="text-2xl font-bold text-black ml-1 dark:text-white"> Chats </h1>
                                    
                            <!-- right action buttons -->
                            <div class="flex items-center gap-2.5">

                                
                                <button class="group">
                                    <ion-icon name="settings-outline" class="text-2xl flex group-aria-expanded:rotate-180"></ion-icon>
                                </button>
                                <div  class="md:w-[270px] w-full" uk-dropdown="pos: bottom-left; offset:10; animation: uk-animation-slide-bottom-small"> 
                                    <nav>
                                        <a href="messages.html#"> <ion-icon class="text-2xl shrink-0 -ml-1" name="checkmark-outline"></ion-icon> Mark all as read </a>  
                                        <a href="messages.html#"> <ion-icon class="text-2xl shrink-0 -ml-1" name="notifications-outline"></ion-icon> notifications setting </a>  
                                        <a href="messages.html#"> <ion-icon class="text-xl shrink-0 -ml-1" name="volume-mute-outline"></ion-icon> Mute notifications </a>     
                                    </nav>
                                </div>
                                
                                <button class="">
                                    <ion-icon name="checkmark-circle-outline" class="text-2xl flex"></ion-icon>
                                </button>

                                <!-- mobile toggle menu -->
                                <button type="button" class="md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
                                    <ion-icon name="chevron-down-outline"></ion-icon>
                                </button>

                            </div>

                        </div>

                        <!-- search -->
                        <div class="relative mt-4">
                            <div class="absolute left-3 bottom-1/2 translate-y-1/2 flex"><ion-icon name="search" class="text-xl"></ion-icon></div>
                            <input type="text" placeholder="Search" class="w-full !pl-10 !py-2 !rounded-lg" id="MessagePageSearch">
                        </div> 

                    </div> 


                    <!-- users list -->
                    <div class="space-y-2 p-2 overflow-y-auto h-[calc(100vh-127px)]">

                        <a href="messages.html#" class="relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-14 h-14 shrink-0"> 
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="object-cover w-full h-full rounded-full">
                                <div class="w-4 h-4 absolute bottom-0 right-0  bg-green-500 rounded-full border border-white dark:border-slate-800"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="mr-auto text-sm text-black dark:text-white font-medium">Jesse Steeve</div>
                                    <div class="text-xs font-light text-gray-500 dark:text-white/70">09:40AM</div> 
                                </div>
                                <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap">Love your photos 😍</div>
                            </div>
                        </a>
                        <a href="messages.html#" class="relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-14 h-14 shrink-0"> 
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="object-cover w-full h-full rounded-full">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="mr-auto text-sm text-black dark:text-white font-medium">Martin Gray</div>
                                    <div class="text-xs font-light text-gray-500 dark:text-white/70">09:40AM</div>
                                    <div class="w-2.5 h-2.5 bg-blue-600 rounded-full dark:bg-slate-700"></div>
                                </div>
                                <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap">Photo editor needed. Fix photos? 🛠️</div>
                            </div>
                        </a>
                      

                    </div>

                </div>
                
                <!-- overly -->
                <div id="side-chat" class="bg-slate-100/40 backdrop-blur w-full h-full dark:bg-slate-800/40 z-40 fixed inset-0 max-md:-translate-x-full md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full"></div>
                
            </div> 