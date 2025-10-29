    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f1419;
            color: #fff;
        }

        /* Story Viewer Styles */
        .story-viewer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .story-viewer.active {
            display: flex;
        }

        .story-viewer-content {
            width: 100%;
            height: 100%;
            max-width: 500px;
            position: relative;
            background: #000;
        }

        /* Progress Bars */
        .story-progress-container {
            position: absolute;
            top: 12px;
            left: 12px;
            right: 12px;
            display: flex;
            gap: 4px;
            z-index: 10;
        }

        .story-progress-bar {
            flex: 1;
            height: 3px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
        }

        .story-progress-fill {
            width: 0%;
            height: 100%;
            background: #fff;
            transition: width 0.1s linear;
        }

        .story-progress-fill.completed {
            width: 100%;
        }

        /* Story Header */
        .story-header {
            position: absolute;
            top: 24px;
            left: 12px;
            right: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
            padding: 12px;
            margin-top: 16px;
        }

        .story-user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .story-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #fff;
            overflow: hidden;
        }

        .story-user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .story-user-details {
            display: flex;
            flex-direction: column;
        }

        .story-user-name {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
        }

        .story-time {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
        }

        .story-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 28px;
            cursor: pointer;
            padding: 4px;
            line-height: 1;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
        }

        /* Story Image */
        .story-image-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            position: relative;
        }

        .story-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Navigation Areas */
        .story-nav {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 40%;
            cursor: pointer;
            z-index: 5;
        }

        .story-nav-prev {
            left: 0;
        }

        .story-nav-next {
            right: 0;
        }

        /* Story Navigation Buttons */
        .story-nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 15;
            font-size: 20px;
        }

        .story-nav-button:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        .story-nav-button-prev {
            left: 12px;
        }

        .story-nav-button-next {
            right: 12px;
        }

        .story-viewer:hover .story-nav-button {
            display: flex;
        }

        /* Pause Indicator */
        .story-paused {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 12px;
            display: none;
            z-index: 20;
            font-size: 14px;
        }

        .story-paused.active {
            display: block;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #1e2732;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #2d3748;
        }

        .modal-header h2 {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin: 0;
        }

        .modal-header .next-btn {
            background: none;
            border: none;
            color: #3b82f6;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .modal-header .next-btn:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        .modal-header .next-btn:disabled {
            color: #4a5568;
            cursor: not-allowed;
        }

        .modal-body {
            padding: 24px;
        }

        .upload-area {
            background: #0f1419;
            border: 2px dashed #4a5568;
            border-radius: 12px;
            padding: 60px 20px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            position: relative;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .upload-area:hover {
            border-color: #3b82f6;
            background: #1a2332;
        }

        .upload-area input[type="file"] {
            display: none;
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-icon svg {
            width: 40px;
            height: 40px;
            stroke: #fff;
        }

        .upload-text {
            color: #e2e8f0;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .upload-subtext {
            color: #718096;
            font-size: 14px;
        }

        .selected-images {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 12px;
            margin-bottom: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        .image-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 8px;
            overflow: hidden;
            background: #0f1419;
        }

        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 24px;
            height: 24px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.2s;
        }

        .remove-btn:hover {
            background: #ef4444;
            transform: scale(1.1);
        }

        .image-counter {
            background: rgba(59, 130, 246, 0.9);
            color: #fff;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-select {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
        }

        .btn-select:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-clear {
            background: #2d3748;
            color: #e2e8f0;
        }

        .btn-clear:hover {
            background: #374151;
        }

        .selected-images::-webkit-scrollbar {
            width: 6px;
        }

        .selected-images::-webkit-scrollbar-track {
            background: #0f1419;
            border-radius: 10px;
        }

        .selected-images::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 10px;
        }

        .selected-images::-webkit-scrollbar-thumb:hover {
            background: #718096;
        }
    </style>

    <div>
        <div>
            <div class="relative" tabindex="-1" uk-slider="autoplay: true;finite: true">
                <div class="py-5 uk-slider-container">
                    <ul class="uk-slider-items w-[calc(100%+14px)]" id="storyList" uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 20;repeat:true">
                        <li class="md:pr-3" uk-scrollspy-class="uk-animation-fade" onclick="openModal()" style="cursor: pointer;">
                            <div class="md:w-20 md:h-20 w-20 h-20 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2">
                                <ion-icon name="camera" class="text-2xl"></ion-icon>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="max-md:hidden">
                    <button type="button" class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="previous"> 
                        <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
                    </button>
                    <button type="button" class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="next"> 
                        <ion-icon name="chevron-forward" class="text-2xl"></ion-icon> 
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Story Modal -->
    <div class="modal" id="addStoryModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Story</h2>
                <button type="button" class="next-btn" id="nextBtn" onclick="addStories()" disabled>Next</button>
            </div>
            
            <div class="modal-body">
                <div id="selectedImagesContainer" style="display: none;">
                    <div class="image-counter" id="imageCounter">0 photos selected</div>
                    <div class="selected-images" id="selectedImages"></div>
                </div>

                <div class="upload-area" id="uploadArea" onclick="document.getElementById('imageUpload').click()">
                    <input type="file" id="imageUpload" accept="image/*" multiple onchange="handleImageSelect(event)">
                    <div class="upload-placeholder">
                        <div class="upload-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="upload-text">Drag photos here</div>
                        <div class="upload-subtext">or click to select from your computer</div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-select" onclick="document.getElementById('imageUpload').click()">
                            Select Photos
                    </button>
                    <button class="btn btn-clear" onclick="clearImages()">Clear All</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Story Viewer -->
    <div class="story-viewer" id="storyViewer">
        <div class="story-viewer-content">
            <!-- Progress Bars -->
            <div class="story-progress-container" id="storyProgressContainer"></div>

            <!-- Header -->
            <div class="story-header">
                <div class="story-user-info">
                    <div class="story-user-avatar">
                        <img id="storyUserAvatar" src="" alt="">
                    </div>
                    <div class="story-user-details">
                        <div class="story-user-name" id="storyUserName">Username</div>
                        <div class="story-time" id="storyTime">2h ago</div>
                    </div>
                </div>
                <button class="story-close" onclick="closeStoryViewer()">×</button>
            </div>

            <!-- Story Image -->
            <div class="story-image-container" id="storyImageContainer">
                <img class="story-image" id="storyImage" src="" alt="">
            </div>

            <!-- Navigation Areas (invisible clickable areas) -->
            <div class="story-nav story-nav-prev" onclick="previousStoryItem()"></div>
            <div class="story-nav story-nav-next" onclick="nextStoryItem()"></div>

            <!-- Navigation Buttons -->
            <button class="story-nav-button story-nav-button-prev" onclick="previousStoryItem()">‹</button>
            <button class="story-nav-button story-nav-button-next" onclick="nextStoryItem()">›</button>

            <!-- Pause Indicator -->
            <div class="story-paused" id="storyPaused">
                Paused
            </div>
        </div>
    </div>
