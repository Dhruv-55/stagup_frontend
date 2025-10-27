
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

        @media (max-width: 640px) {
            .modal-content {
                max-width: 100%;
                border-radius: 12px;
            }

            .modal-header {
                padding: 16px 20px;
            }

            .modal-body {
                padding: 20px;
            }

            .upload-area {
                padding: 40px 20px;
                min-height: 280px;
            }

            .upload-icon {
                width: 60px;
                height: 60px;
            }

            .upload-icon svg {
                width: 30px;
                height: 30px;
            }

            .upload-text {
                font-size: 15px;
            }

            .upload-subtext {
                font-size: 13px;
            }

            .selected-images {
                grid-template-columns: repeat(3, 1fr);
            }
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
</head>
<body>
    <div>
        <div>
            <div class="relative" tabindex="-1" uk-slider="autoplay: true;finite: true" uk-lightbox="">

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
                    <button type="button" class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl"></ion-icon></button>
                    <button type="button" class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon> </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
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
