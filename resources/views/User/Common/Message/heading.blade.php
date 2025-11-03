<div class="flex items-center justify-between gap-2 w- px-6 py-3.5 z-10 border-b dark:border-slate-700 uk-animation-slide-top-medium">
    <div class="flex items-center sm:gap-4 gap-2" >

        <!-- toggle for mobile -->
        <button type="button" class="md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
            <ion-icon name="chevron-back-outline" class="text-2xl -ml-4"></ion-icon>
        </button>
        
      <div class="flex items-center gap-2" id="ChatHeader">
            <div class="relative cursor-pointer max-md:hidden"  uk-toggle="target: .rightt ; cls: hidden">
                <img src="assets/images/avatars/avatar-6.jpg" alt="" class="w-8 h-8 rounded-full shadow">
                <div class="w-2 h-2 bg-teal-500 rounded-full absolute right-0 bottom-0 m-px"></div>
            </div>
            <div class="cursor-pointer" uk-toggle="target: .rightt ; cls: hidden">
                <div class="text-base font-bold"> Monroe Parker</div>
                <div class="text-xs text-green-500 font-semibold"> Online</div>
            </div>
      </div>

    </div>  
</div>