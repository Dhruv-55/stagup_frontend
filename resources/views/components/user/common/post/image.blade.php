<div>
    <div id="HomePost">

    </div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
     @section("ajax-scripts")
<script>
              
const BaseURL = "{{ env('API_ROUTE_URL') }}";
const paramID = "{{ request()->route('id') ?? 0 }}";
const token = localStorage.getItem('auth_token');
$(document).ready(function() {
   
   function loadData(){
     $.ajax({
        url: BaseURL + "/home",
        headers: {
            'Authorization': 'Bearer ' + token
        },
        type: "GET",     
        success: function(response) {
            $("#HomePost").html("");
            if(response.data.length > 0){
            response.data.forEach(item => {
                let post =    
                    `<div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2 my-2 " >

                        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                            <a href="/profile/${item.user.id}"> <img src="${ getImageUrl(item.user.profile?.profile_image) }" alt="" class="w-9 h-9 rounded-full"> </a>  
                            <div class="flex-1">
                                <a href="/profile/${item.user.id}"> <h4 class="text-black dark:text-white"> ${item.user.username} </h4> </a>  
                                <div class="text-xs text-gray-500 dark:text-white/80"> ${humanizeDate(item.created_at)}</div>
                            </div>

                           
                        </div>
                        
                        <div class="relative w-full sm:px-4" style="height: 400px;">
                        <img src="${ item.image ? getImageUrl(item.image) : '/default.jpg' }" 
                            alt="" 
                            class="sm:rounded-lg w-full h-full object-cover"
                            style="height: 400px; object-fit: cover;">
                    </div>

                    
                        <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                            <div class="flex items-center gap-2.5">
                                <button type="button" onclick="likeOrDislike(${item.id})" class="button__ico ${item.is_liked ? 'text-red-500 bg-red-100' : 'text-gray-500 bg-gray-100'} dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                <a href="javascript:void(0);">${item.total_likes}</a>
                            </div>
                        </div>

                       

                    </div>`;
                $("#HomePost").append(post);
            })
            }else{
                $("#HomePost").append("No data found");
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
   }


    window.likeOrDislike = function(postId){
        $.ajax({
            url: BaseURL + "/general/likeOrDislike",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "POST",     
            data: {
                event_id: postId
            },
            success: function(response) {
               loadData();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    loadData();
});


</script>
 <script>
        let selectedImages = [];

        function openModal() {
            document.getElementById('addStoryModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('addStoryModal').classList.remove('active');
            clearImages();
        }

        function handleImageSelect(event) {
            const files = Array.from(event.target.files);
            
            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        selectedImages.push({
                            id: Date.now() + Math.random(),
                            data: e.target.result
                        });
                        renderSelectedImages();
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function renderSelectedImages() {
            const container = document.getElementById('selectedImages');
            const counterElement = document.getElementById('imageCounter');
            const selectedContainer = document.getElementById('selectedImagesContainer');
            const nextBtn = document.getElementById('nextBtn');
            
            if (selectedImages.length > 0) {
                selectedContainer.style.display = 'block';
                counterElement.textContent = `${selectedImages.length} photo${selectedImages.length > 1 ? 's' : ''} selected`;
                nextBtn.disabled = false;
                
                container.innerHTML = selectedImages.map((img, index) => `
                    <div class="image-item">
                        <img src="${img.data}" alt="Selected ${index + 1}">
                        <button class="remove-btn" onclick="removeImage(${index})">×</button>
                    </div>
                `).join('');
            } else {
                selectedContainer.style.display = 'none';
                nextBtn.disabled = true;
            }
        }

        function removeImage(index) {
            selectedImages.splice(index, 1);
            renderSelectedImages();
        }

        function clearImages() {
            selectedImages = [];
            document.getElementById('imageUpload').value = '';
            renderSelectedImages();
        }

        function addStories() {
            if (selectedImages.length === 0) {
                alert('Please select at least one image');
                return;
            }

            const storyList = document.getElementById('storyList');
            $.ajax({
                url: MainURL + "/story/add-or-update",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                type: "POST",     
                data: {
                    images: selectedImages
                },
                success: function(response) {
                    closeModal();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });


            
            
            closeModal();
        }

        document.getElementById('addStoryModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Drag and drop functionality
        const uploadArea = document.getElementById('uploadArea');
        
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#3b82f6';
            uploadArea.style.background = '#1a2332';
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.style.borderColor = '#4a5568';
            uploadArea.style.background = '#0f1419';
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#4a5568';
            uploadArea.style.background = '#0f1419';
            
            const files = Array.from(e.dataTransfer.files);
            const input = document.getElementById('imageUpload');
            
            const dataTransfer = new DataTransfer();
            files.forEach(file => {
                if (file.type.startsWith('image/')) {
                    dataTransfer.items.add(file);
                }
            });
            
            input.files = dataTransfer.files;
            handleImageSelect({ target: input });
        });
        
         window.loadStories = function(){
            $.ajax({
                url: MainURL + "/story/load-stories",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                type: "GET",     
                success: function(response) {
                    storyList.innerHTML = "";
                  response.data.forEach(item => {
                let story = `
                 <li class="md:pr-3" uk-scrollspy-class="uk-animation-fade" onclick="openModal()" style="cursor: pointer;">
                            <div class="md:w-20 md:h-20 w-20 h-20 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2">
                                <ion-icon name="camera" class="text-2xl"></ion-icon>
                            </div>
                        </li>
                    <li class="md:pr-2.5 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                        <a href="${ getImageUrl(item.image) }" data-caption="Caption 1">
                            <div class="md:w-20 md:h-20 w-20 h-20 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                <img src="${ getImageUrl(item.image) }" alt="" class="absolute w-full h-full object-cover">
                            </div>
                        </a>
                    </li>`;
                storyList.insertAdjacentHTML('beforeend', story);
            });

                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
       $(document).ready(function() {
            loadStories();
        });
</script>
@endsection
</div>


