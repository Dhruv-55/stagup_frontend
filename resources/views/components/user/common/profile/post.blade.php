<div>
  <div class="mt-10">

    <!-- sticky tabs -->

    <div  uk-sticky="cls-active: bg-slate-100/60 z-30 backdrop-blur-lg px-4 dark:bg-slate-800/60; start: 500; animation: uk-animation-slide-top">
        
        <nav class="text-sm text-center text-gray-500 capitalize font-semibold dark:text-white">
            <ul     class="flex gap-2 justify-center border-t dark:border-slate-700"
                    uk-switcher="connect: #story_tab ; animation: uk-animation-fade, uk-animation-slide-left-medium">
            
                <li> <a href="profile.html#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> <ion-icon class="mr-2 text-2xl" name="camera-outline"></ion-icon> Posts  </a> </li>
                <!-- <li> <a href="profile.html#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> <ion-icon class="mr-2 text-2xl" name="play-outline"></ion-icon> Reels </a> </li>
                <li> <a href="profile.html#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white"> <ion-icon class="mr-2 text-2xl" name="pricetags-outline"></ion-icon> Tagged </a> </li> -->
            </ul>
        </nav>

    </div>

    <div id="story_tab" class="uk-switcher">
        
        
        <!-- Post list -->
        <div>
        
          

            <!-- post list  -->

            <div class="mt-8">

                <!-- post heading -->
                <div class="flex items-center justify-between py-3">
                    <h1 class="text-xl font-bold text-black dark:text-white">Posts</h1>

                    <!-- <a href="javascript:void(0);" class="text-sm font-semibold flex items-center gap-2">
                        Show acheived  <ion-icon name="chevron-forward-outline"></ion-icon> 
                    </a> -->
                </div>

                <!-- Post list -->
                <!-- <div class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 mt-6"  uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100"> -->
                    
                    <!-- <div id="ProfilePostList">
                        
                    </div> -->


                    <!-- placeholders -->
                    <!-- <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
                    <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
                    <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
                    <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div> -->

                <!-- </div> -->
                <div id="ProfilePostList" 
                    class="grid lg:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 mt-6"  
                    uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100">
                </div>

            </div>

            <!-- load more -->
            <!-- <div class="flex justify-center my-6">
                <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
            </div> -->

        </div>


        
      
        





    </div>

</div>             
</div>
