<div class="flex items-center md:gap-4 gap-2 md:p-3 p-2 overflow-hidden">

                    <div id="message__wrap" class="flex items-center gap-2 h-full dark:text-white -mt-1.5">
                        
                        <!-- <button type="button"  class="shrink-0">
                            <ion-icon class="text-3xl flex" name="add-circle-outline"></ion-icon>
                        </button> -->
                        <div class="dropbar pt-36 h-60 bg-gradient-to-t via-white from-white via-30% from-30% dark:from-slate-900 dark:via-900" uk-drop="stretch: x; target: #message__wrap ;animation:  slide-bottom ;animate-out: true; pos: top-left; offset:10 ; mode: click ; duration: 200">

                            <div class="sm:w-full p-3 flex justify-center gap-5" uk-scrollspy="target: > button; cls: uk-animation-slide-bottom-small; delay: 100;repeat:true">
                                
                                <button type="button" class="bg-sky-50 text-sky-600 border border-sky-100 shadow-sm p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15] dark:bg-dark3 dark:border-0">
                                    <ion-icon class="text-3xl flex" name="image"></ion-icon>
                                </button>
                                <button type="button" class="bg-green-50 text-green-600 border border-green-100 shadow-sm p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15] dark:bg-dark3 dark:border-0">
                                    <ion-icon class="text-3xl flex" name="images"></ion-icon>
                                </button>
                                <button type="button" class="bg-pink-50 text-pink-600 border border-pink-100 shadow-sm p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15] dark:bg-dark3 dark:border-0">
                                    <ion-icon class="text-3xl flex" name="document-text"></ion-icon>
                                </button>
                                <button type="button" class="bg-orange-50 text-orange-600 border border-orange-100 shadow-sm p-2.5 rounded-full shrink-0 duration-100 hover:scale-[1.15] dark:bg-dark3 dark:border-0">
                                    <ion-icon class="text-3xl flex" name="gift"></ion-icon>
                                </button>


                            </div>
                            
                        </div>

                        <!-- <button type="button"  class="shrink-0">
                            <ion-icon class="text-3xl flex" name="happy-outline"></ion-icon>
                        </button> -->
                        <div class="dropbar p-2" uk-drop="stretch: x; target: #message__wrap ;animation: uk-animation-scale-up uk-transform-origin-bottom-left ;animate-out: true; pos: top-left ; offset:2; mode: click ; duration: 200 ">

                            <div class="sm:w-60 bg-white shadow-lg border rounded-xl  pr-0 dark:border-slate-700 dark:bg-dark3">

                                <h4 class="text-sm font-semibold p-3 pb-0">Send Imogi</h4>

                                <div class="grid grid-cols-5 overflow-y-auto max-h-44 p-3 text-center text-xl">

                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😊 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🤩 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😎</div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🥳 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😂 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🥰 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😡 </div> 
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😊 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🤩 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😎</div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🥳 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😂 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🥰 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😡 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🤔 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😊 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🤩 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😎</div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 🥳 </div>
                                    <div class="hover:bg-secondery p-1.5 rounded-md hover:scale-125 cursor-pointer duration-200"> 😂 </div>
                                    
                                </div>
                                    

                            </div>
                            
                        </div>

                    </div>
                    
                    <div class="relative flex-1">
                        <textarea id="MessageInput" placeholder="Write your message" rows="1" class="w-full resize-none bg-secondery rounded-full px-4 p-2"></textarea>
                    
                        <button id="SendMessageButton" type="button" class="text-white shrink-0 p-2 absolute right-0.5 top-0">
                            <ion-icon class="text-xl flex" name="send-outline"></ion-icon> 
                        </button>

                    </div>

                    <!-- <button type="button" class="flex h-full dark:text-white">
                        <ion-icon class="text-3xl flex -mt-3" name="heart-outline"></ion-icon> 
                    </button> -->

                </div>