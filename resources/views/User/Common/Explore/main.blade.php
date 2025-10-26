@extends('User.Template.layout')

@section('content')
    <div class="gallery -mt-16" id="galleryContainer">
        
        <!-- Loading skeletons (shown initially) -->
        <div class="gallery__card skeleton">
            <div class="w-full h-60 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
        <div class="gallery__card skeleton">
            <div class="w-full h-72 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
        <div class="gallery__card skeleton">
            <div class="w-full h-64 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
        <div class="gallery__card skeleton">
            <div class="w-full h-60 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
        <div class="gallery__card skeleton">
            <div class="w-full h-72 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
        <div class="gallery__card skeleton">
            <div class="w-full h-64 bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse"></div>
        </div>
            
    </div>

    <!-- Loading indicator for infinite scroll -->
    <div id="loadingIndicator" class="text-center py-8" style="display: none;">
        <div class="inline-block">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Loading more...</p>
        </div>
    </div>

    <!-- End of results indicator -->
    <div id="endIndicator" class="text-center py-8" style="display: none;">
        <p class="text-gray-500 dark:text-gray-400">No more images to load</p>
    </div>
@endsection

@section('ajax-scripts')  
<script>
    $(document).ready(function (){
        let currentPage = 1;
        let isLoading = false;
        let hasMoreData = true;

        // Load initial data
        loadGalleryData(currentPage);

        // Infinite scroll listener
        $(window).scroll(function() {
            // Check if user scrolled near bottom (200px before end)
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
                if (!isLoading && hasMoreData) {
                    currentPage++;
                    loadGalleryData(currentPage);
                }
            }
        });

        function loadGalleryData(page) {
            isLoading = true;
            
            // Show loading indicator
            if (page > 1) {
                
                $('#loadingIndicator').show();
            }

            $.ajax({
                url : MainURL + "/general/explore", 
                method : "GET",
                data: {
                    page: page,
                    per_page: 20 // Adjust as needed
                },
                headers:{
                    'Authorization' : 'Bearer ' + MainToken
                },
                success : function (response){
                    
                    // Hide loading indicator
                    $('#loadingIndicator').hide();

                    // Clear skeletons on first load
                    if (page == 1) {
                        $('.skeleton').remove();
                    }
                    
                    // Check if response has data
                    if(response.data && response.data.length > 0) {
                        
                        // Loop through response data
                        response.data.forEach(function(item, index) {
                            const card = `
                                <div class="gallery__card" data-index="${index}">
                                    <a hred="javascript:void(0);"> 
                                        <div class="card__image">
                                            <img src="${item.image ? getImageUrl(item.image) : '/default.jpg'}" 
                                                 alt="${item.title || ''}"
                                                 loading="lazy"
                                                 onerror="this.src='/default.jpg'">
                                        </div>
                                    </a>
                                </div>
                            `;
                            $('#galleryContainer').append(card);
                        });

                        // Check if there's more data
                        // Adjust this condition based on your API response structure
                        if (response.data.length < 20 || response.has_more == false) {
                            hasMoreData = false;
                            $('#endIndicator').show();
                        }
                        
                        // Re-trigger UIkit animation if needed
                        if (typeof UIkit !== 'undefined') {
                            UIkit.scrollspy('#galleryContainer', {
                                target: '> div',
                                cls: 'uk-animation-scale-up',
                                delay: 100
                            });
                        }

                    } else {
                        // No more data
                        hasMoreData = false;
                        
                        if (page == 1) {
                            // Show empty state on first load
                            $('#galleryContainer').html(`
                                <div class="col-span-full text-center py-12">
                                    <p class="text-gray-500 dark:text-gray-400">No images found</p>
                                </div>
                            `);
                        } else {
                            // Show end indicator
                            $('#endIndicator').show();
                        }
                    }
                    
                    isLoading = false;
                },
                error: function(xhr, status, error) {
                    console.error('Error loading gallery:', error);
                    $('#loadingIndicator').hide();
                    
                    if (page === 1) {
                        $('#galleryContainer').html(`
                            <div class="col-span-full text-center py-12">
                                <p class="text-red-500">Failed to load images. Please try again.</p>
                                <button onclick="location.reload()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Retry
                                </button>
                            </div>
                        `);
                    } else {
                        // Show error for pagination
                        alert('Failed to load more images. Please try again.');
                    }
                    
                    isLoading = false;
                    hasMoreData = false;
                }
            });
        }
    });
</script>
@endsection

<style>
/* Gallery Grid - Column-based Masonry */
.gallery {
    column-count: 4;
    column-gap: 1rem;
    padding: 1rem;
}

/* Mobile - 1 column */
@media (max-width: 640px) {
    .gallery {
        column-count: 1;
    }
}

/* Small Tablet - 2 columns */
@media (min-width: 641px) and (max-width: 768px) {
    .gallery {
        column-count: 2;
    }
}

/* Tablet - 3 columns */
@media (min-width: 769px) and (max-width: 1024px) {
    .gallery {
        column-count: 3;
    }
}

/* Desktop - 4 columns */
@media (min-width: 1025px) {
    .gallery {
        column-count: 4;
    }
}

/* Large Desktop - 5 columns */
@media (min-width: 1440px) {
    .gallery {
        column-count: 5;
    }
}

/* Gallery Card */
.gallery__card {
    break-inside: avoid;
    page-break-inside: avoid;
    margin-bottom: 1rem;
    cursor: pointer;
    border-radius: 0.5rem;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    display: inline-block;
    width: 100%;
}

.gallery__card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

/* Card Image Container */
.card__image {
    position: relative;
    width: 100%;
    overflow: hidden;
    background: #f3f4f6;
}

/* Image Styling - Maintain Aspect Ratio */
.card__image img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
}

.gallery__card:hover .card__image img {
    transform: scale(1.05);
}

/* Link styling */
.gallery__card a {
    display: block;
    text-decoration: none;
}

/* Dark mode support */
.dark .gallery__card {
    background: #1e293b;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.dark .card__image {
    background: #334155;
}

.dark .gallery__card:hover {
    box-shadow: 0 8px 16px rgba(0,0,0,0.5);
}

/* Loading skeleton adjustments */
.gallery__card.skeleton {
    background: transparent;
    box-shadow: none;
}

.gallery__card.skeleton:hover {
    transform: none;
}

/* Loading spinner animation */
@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.animate-spin {
    animation: spin 1s linear infinite;
}
</style>