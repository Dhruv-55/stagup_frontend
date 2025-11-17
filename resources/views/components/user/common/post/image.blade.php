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
        let currentPage = 1;
        let isLoading = false;
        let hasMorePages = true;
        
        function loadData(page = 1, append = false) {
            if (isLoading || !hasMorePages) return;
            
            isLoading = true;
            
            // Show loading indicator
            if (append) {
                $("#HomePost").append('<div id="loading" class="text-center py-4">Loading...</div>');
            }
            
            $.ajax({
                url: BaseURL + "/home",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "GET",
                data: {
                    page: page
                },
                success: function(response) {
                    // Remove loading indicator
                    $("#loading").remove();
                    
                    if (!append) {
                        $("#HomePost").html("");
                    }
                    
                    if (response.data.data && response.data.data.length > 0) {
                        response.data.data.forEach(item => {
                            let post = `
                                <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2 my-2">
                                    <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                        <a href="/profile/${item.user.id}"> 
                                            <img src="${getImageUrl(item.user.profile?.profile_image ?? "/assets/default.png")}" alt="" class="w-9 h-9 rounded-full"> 
                                        </a>  
                                        <div class="flex-1">
                                            <a href="/profile/${item.user.id}"> 
                                                <h4 class="text-black dark:text-white">${item.user.username}</h4> 
                                            </a>  
                                            <div class="text-xs text-gray-500 dark:text-white/80">${humanizeDate(item.created_at)}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="relative w-full sm:px-4" style="height: 400px;">
                                        <img src="${item.image ? getImageUrl(item.image) : '/default.jpg'}" 
                                            alt="" 
                                            class="sm:rounded-lg w-full h-full object-cover"
                                            style="height: 400px; object-fit: cover;">
                                    </div>
                                    
                                    <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                        <div class="flex items-center gap-2.5">
                                            <button type="button" onclick="likeOrDislike(${item.id})" 
                                                class="button__ico ${item.is_liked ? 'text-red-500 bg-red-100' : 'text-gray-500 bg-gray-100'} dark:bg-slate-700"> 
                                                <ion-icon class="text-lg" name="heart"></ion-icon> 
                                            </button>
                                            <a href="javascript:void(0);">${item.total_likes}</a>
                                        </div>
                                    </div>
                                </div>`;
                            $("#HomePost").append(post);
                        });
                        
                        currentPage = response.data.current_page;
                        hasMorePages = response.data.has_more;
                        
                    } else if (!append) {
                        $("#HomePost").append("No data found");
                    }
                    
                    isLoading = false;
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    $("#loading").remove();
                    isLoading = false;
                }
            });
        }

        // Infinite scroll handler
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                if (hasMorePages && !isLoading) {
                    loadData(currentPage + 1, true);
                }
            }
        });

        window.likeOrDislike = function(postId) {
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
                    // Reload current page data instead of all data
                    currentPage = 1;
                    hasMorePages = true;
                    loadData(1, false);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        
        // Initial load
        loadData(1, false);
    });
</script>
        <script>
            let selectedImages = [];
            let storiesData = [];
            let currentStoryIndex = 0;
            let currentImageIndex = 0;
            let storyTimer = null;
            let progressTimer = null;
            let isPaused = false;
            const STORY_DURATION = 5000; // 5 seconds per image

            // Mock function - replace with your actual implementation
            function getImageUrl(imagePath) {
                return imagePath;
            }

            // Add Story Modal Functions
            function openModal() {
                document.getElementById('addStoryModal').classList.add('active');
            }

            function closeModal() {
                document.getElementById('addStoryModal').classList.remove('active');
                clearImages();
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

          

            // Modified addStories function to use FormData
            function addStories() {
                if (selectedImages.length === 0) {
                    alert('Please select at least one image');
                    return;
                }

                // Create FormData object
                const formData = new FormData();
                
                // Get the file input element
                const fileInput = document.getElementById('imageUpload');
                
                // Append all selected files to FormData
                Array.from(fileInput.files).forEach((file, index) => {
                    formData.append('images[]', file);
                });

                $.ajax({
                    url: MainURL + "/story/add-or-update",
                    headers: {
                        'Authorization': 'Bearer ' + MainToken
                    },
                    type: "POST",
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (let browser set it with boundary)
                    success: function(response) {
                        loadStories();
                        closeModal();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                        alert('Failed to upload story. Please try again.');
                    }
                });
            }

            // Modified handleImageSelect to store actual File objects
            let selectedFiles = []; // Add this at the top with other variables

            function handleImageSelect(event) {
                const files = Array.from(event.target.files);
                
                // Store actual files
                selectedFiles = files;
                
                // Create previews
                selectedImages = [];
                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            selectedImages.push({
                                id: Date.now() + Math.random(),
                                data: e.target.result,
                                file: file
                            });
                            renderSelectedImages();
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Modified removeImage function
            function removeImage(index) {
                selectedImages.splice(index, 1);
                
                // Update the file input
                const input = document.getElementById('imageUpload');
                const dt = new DataTransfer();
                
                selectedImages.forEach(img => {
                    if (img.file) {
                        dt.items.add(img.file);
                    }
                });
                
                input.files = dt.files;
                renderSelectedImages();
            }

            // Modified clearImages function
            function clearImages() {
                selectedImages = [];
                selectedFiles = [];
                document.getElementById('imageUpload').value = '';
                renderSelectedImages();
            }

            // Story Viewer Functions
            function openStoryViewer(storyIndex) {
                currentStoryIndex = storyIndex;
                currentImageIndex = 0;
                document.getElementById('storyViewer').classList.add('active');
                document.body.style.overflow = 'hidden';
                showStory();
            }

            function closeStoryViewer() {
                document.getElementById('storyViewer').classList.remove('active');
                document.body.style.overflow = 'auto';
                stopStoryTimer();
            }

            function showStory() {
                if (!storiesData[currentStoryIndex]) return;

                const story = storiesData[currentStoryIndex];
                const images = story.images;

                // Update user info
                document.getElementById('storyUserName').textContent = story.username;
                document.getElementById('storyUserAvatar').src = story.avatar;
                document.getElementById('storyTime').textContent = getTimeAgo(story.timestamp);

                // Create progress bars
                const progressContainer = document.getElementById('storyProgressContainer');
                progressContainer.innerHTML = images.map((_, index) => `
                    <div class="story-progress-bar">
                        <div class="story-progress-fill" id="progress-${index}"></div>
                    </div>
                `).join('');

                // Show current image
                showStoryImage();
            }

            function showStoryImage() {
                const story = storiesData[currentStoryIndex];
                const image = story.images[currentImageIndex];

                // Update image
                const imgElement = document.getElementById('storyImage');
                imgElement.src = image.url;

                // Mark previous progress bars as completed
                for (let i = 0; i < currentImageIndex; i++) {
                    const progressBar = document.getElementById(`progress-${i}`);
                    if (progressBar) {
                        progressBar.classList.add('completed');
                    }
                }

                // Start progress for current image
                startStoryTimer();
            }

            function startStoryTimer() {
                stopStoryTimer();
                isPaused = false;

                const progressBar = document.getElementById(`progress-${currentImageIndex}`);
                if (!progressBar) return;

                let startTime = Date.now();
                let elapsed = 0;

                progressTimer = setInterval(() => {
                    if (!isPaused) {
                        elapsed = Date.now() - startTime;
                        const progress = Math.min((elapsed / STORY_DURATION) * 100, 100);
                        progressBar.style.width = progress + '%';

                        if (progress >= 100) {
                            nextStoryItem();
                        }
                    }
                }, 50);
            }

            function stopStoryTimer() {
                if (progressTimer) {
                    clearInterval(progressTimer);
                    progressTimer = null;
                }
            }

            function nextStoryItem() {
                const story = storiesData[currentStoryIndex];
                
                if (currentImageIndex < story.images.length - 1) {
                    // Next image in current story
                    currentImageIndex++;
                    showStoryImage();
                } else if (currentStoryIndex < storiesData.length - 1) {
                    // Next story
                    currentStoryIndex++;
                    currentImageIndex = 0;
                    showStory();
                } else {
                    // End of all stories
                    closeStoryViewer();
                }
            }

            function previousStoryItem() {
                if (currentImageIndex > 0) {
                    // Previous image in current story
                    currentImageIndex--;
                    showStoryImage();
                } else if (currentStoryIndex > 0) {
                    // Previous story
                    currentStoryIndex--;
                    const prevStory = storiesData[currentStoryIndex];
                    currentImageIndex = prevStory.images.length - 1;
                    showStory();
                }
            }

            function togglePause() {
                isPaused = !isPaused;
                const pausedIndicator = document.getElementById('storyPaused');
                if (isPaused) {
                    pausedIndicator.classList.add('active');
                } else {
                    pausedIndicator.classList.remove('active');
                }
            }

            // Add pause on long press
            let longPressTimer;
            document.getElementById('storyViewer').addEventListener('mousedown', () => {
                longPressTimer = setTimeout(() => {
                    isPaused = true;
                    document.getElementById('storyPaused').classList.add('active');
                }, 200);
            });

            document.getElementById('storyViewer').addEventListener('mouseup', () => {
                clearTimeout(longPressTimer);
                if (isPaused) {
                    isPaused = false;
                    document.getElementById('storyPaused').classList.remove('active');
                }
            });

            // Touch events for mobile
            document.getElementById('storyViewer').addEventListener('touchstart', () => {
                longPressTimer = setTimeout(() => {
                    isPaused = true;
                    document.getElementById('storyPaused').classList.add('active');
                }, 200);
            });

            document.getElementById('storyViewer').addEventListener('touchend', () => {
                clearTimeout(longPressTimer);
                if (isPaused) {
                    isPaused = false;
                    document.getElementById('storyPaused').classList.remove('active');
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                const viewer = document.getElementById('storyViewer');
                if (!viewer.classList.contains('active')) return;

                if (e.key === 'ArrowRight') {
                    nextStoryItem();
                } else if (e.key === 'ArrowLeft') {
                    previousStoryItem();
                } else if (e.key === 'Escape') {
                    closeStoryViewer();
                }
            });

          // Load Stories Funct ion
            window.loadStories = function() {
                $.ajax({
                    url: MainURL + "/story/load-stories",
                    headers: {
                        'Authorization': 'Bearer ' + MainToken
                    },
                    type: "GET",
                    success: function(response) {
                        storiesData = response.data.map(item => {
                            // Default avatar
                            let avatar = "assets/default.png";
                            if (item.user?.profile?.profile_image) {
                                avatar = getImageUrl(item.user.profile.profile_image);
                            }

                            // Username
                            let username = item.user?.username || 'User';

                            // Images - story_data is an array, so we need to get the first element
                            let images = [];
                            console.log(item.story_data); // This will show the array
                            
                            // Check if story_data exists and has at least one element
                            if (Array.isArray(item.story_data) && item.story_data.length > 0) {
                                // Get images from the first story_data element
                                const storyDataImages = item.story_data[0].images;
                                console.log('Images:', storyDataImages);
                                
                                if (Array.isArray(storyDataImages)) {
                                    images = storyDataImages.map(url => ({
                                        url: url,
                                        timestamp: item.story_data[0].created_at || item.created_at || new Date().toISOString()
                                    }));
                                }
                            } 
                            
                            // Fallback if no images found
                            if (images.length === 0) {
                                images = [{
                                    url: avatar,
                                    timestamp: item.created_at || new Date().toISOString()
                                }];
                            }

                            return {
                                id: item.id,
                                username: username,
                                avatar: avatar,
                                images: images,
                                timestamp: item.created_at || new Date().toISOString()
                            };
                        });

                        console.log('Processed Stories Data:', storiesData);
                        renderStoryList();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading stories:', error);
                    }
                });
            };

            function renderStoryList() {
                const storyList = document.getElementById('storyList');
                const addStoryButton = storyList.querySelector('li:first-child');
                
                storyList.innerHTML = '';
                storyList.appendChild(addStoryButton);

                storiesData.forEach((story, index) => {
                    const storyItem = document.createElement('li');
                    storyItem.className = 'md:pr-2.5 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300';
                    storyItem.style.cursor = 'pointer';
                    storyItem.onclick = () => openStoryViewer(index);
                    
                    storyItem.innerHTML = `
                        <div class="md:w-20 md:h-20 w-20 h-20 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700" style="background: linear-gradient(45deg, black, gold, transparent); padding: 3px;">
                            <div style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; border: 2px solid #0f1419;">
                                <img src="${story.avatar}" alt="${story.username}" class=" w-full h-full object-cover">
                            </div>
                        </div>
                    `;
                    
                    storyList.appendChild(storyItem);
                });
            }

            function getTimeAgo(timestamp) {
                const now = new Date();
                const time = new Date(timestamp);
                const diff = Math.floor((now - time) / 1000); // difference in seconds

                if (diff < 60) return 'Just now';
                if (diff < 3600) return Math.floor(diff / 60) + 'm ago';
                if (diff < 86400) return Math.floor(diff / 3600) + 'h ago';
                if (diff < 604800) return Math.floor(diff / 86400) + 'd ago';
                return Math.floor(diff / 604800) + 'w ago';
            }

            // Modal click outside to close
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

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                loadStories();
            });


            // function getUserLocation() {
            //         fetch("https://ipinfo.io/json?token=c72ee69f4cae46")
            //         .then((response) => response.json())
            //         .then((data) => {

            //             console.log(data);
            //             // Autofill the form fields
            //             // document.getElementById("city").value = data.city || '';
            //             // document.getElementById("state").value = data.region || '';
            //         })
            //         .catch((error) => {
            //             console.error("Failed to fetch location data:", error);
            //         });
            // }
            // getUserLocation();
            // If using jQuery, use this instead:
            /*
            $(document).ready(function() {
                loadStories();
            });
            */
          
        </script>

        <script>
            $(document).ready(function () {
                let userData = localStorage.getItem('user_data');
                userData = JSON.parse(userData);
                $.ajax({
                    url: MainURL + "/user-location/is-today-location-updated",
                    headers: {
                        'Authorization': 'Bearer ' + MainToken
                    },
                    data: {
                        user_id: userData.id
                    },
                    type: "GET",
                    success: function(response) {
                        if(response.success){
                            let location_updated = response.data.isTodayLocationUpdated;
                            if(!location_updated){
                                

                            if (!navigator.geolocation) {
                                console.error("Geolocation is not supported by your browser.");
                                return;
                            }

                            const options = {
                                enableHighAccuracy: true,
                                timeout: 10000,
                                maximumAge: 60000
                            };

                            navigator.geolocation.getCurrentPosition(
                                function (position) {
                                const lat = position.coords.latitude;
                                const lon = position.coords.longitude;

                                console.log("✅ Coordinates:");
                                console.log("Latitude:", lat);
                                console.log("Longitude:", lon);

                                // Call OpenStreetMap reverse geocoding API
                                $.get(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`, function (data) {
                                    if (data && data.address) {
                                    const address = data.address;

                                    const city = address.city || address.town || address.village || address.county || "Unknown";
                                    const state = address.state || "Unknown";
                                    const country = address.country || "Unknown";
                                    const pincode = address.postcode || "Unknown";

                                    
                                        $.ajax({
                                            url: MainURL + "/user-location/update-or-create",
                                            headers: {
                                                'Authorization': 'Bearer ' + MainToken
                                            },
                                            data: {
                                                user_id: userData.id,
                                                latitude: lat,
                                                longitude: lon,
                                                city: city,
                                                state: state,
                                                country: country,
                                                pincode: pincode
                                            },
                                            type: "POST",
                                            success: function(response) {
                                                console.log(response);
                                                if(response.success){
                                                    localStorage.setItem('user_location', JSON.stringify(response.data));
                                                }
                                            },
                                            error: function(error) {
                                                console.log(error);
                                            }
                                        });    


                                    } else {
                                    console.warn("⚠️ Unable to get detailed address info.");
                                    }
                                }).fail(function (err) {
                                    console.error("❌ Reverse geocoding failed:", err);
                                });
                                },
                                function (error) {
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                    console.error("❌ Permission denied by user.");
                                    break;
                                    case error.POSITION_UNAVAILABLE:
                                    console.error("❌ Position unavailable.");
                                    break;
                                    case error.TIMEOUT:
                                    console.error("⏳ Location request timed out.");
                                    break;
                                    default:
                                    console.error("⚠️ Unknown error:", error.message);
                                }
                                },
                                options
                            );

                            }
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });
        </script>
    @endsection
</div>


