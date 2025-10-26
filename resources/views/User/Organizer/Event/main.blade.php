@extends('User.Template.layout')
@section('content')
<div class="max-w-2xl mx-auto">
    @php 
        $previousUrl = url()->previous();
    @endphp
    <!-- heading title -->
    <div class="page__heading py-6 mt-6">
        <a href="{{ $previousUrl }}">
            <ion-icon name="chevron-back-outline"></ion-icon> Back
        </a>
        <h1> Events </h1>
    </div>
    
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 dark:bg-dark2">
        
        <div class="flex md:gap-8 gap-4 items-center md:p-10 p-6">

            <div class="flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white" id="headingText">My Events</h3>
                <p class="text-sm text-blue-600 mt-1 font-normal" id="subHeadingText">Manage your events</p>
            </div>

            <div>
                <button id="MainEveBtn" type="button" class="button bg-primary text-white flex items-center gap-2" uk-toggle="target: #add-event-modal">
                    <ion-icon name="add-outline" class="text-xl"></ion-icon>
                    <span class="max-md:hidden">Add Event</span>
                </button>
            </div>
        </div>
            
        <hr class="border-t border-gray-100 dark:border-slate-700">
        
        <!-- nav tabs -->
        <div class="relative -mb-px px-2" tabindex="-1" uk-slider="finite: true">
            <nav class="overflow-hidden rounded-xl uk-slider-container pt-2">
                <ul class="uk-slider-items w-[calc(100%+10px)] capitalize font-semibold text-gray-500 text-sm dark:text-white" 
                    uk-switcher="connect: #event_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"> 
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> All Events </a> </li>
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> Upcoming</a> </li>
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> Featured</a> </li>
                </ul>
            </nav>
            <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2.5 justify-start rounded-xl bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon> </a>
            <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2.5 justify-end rounded-xl bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="next">  <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon> </a>
        </div>
    </div>

    <!-- tab content -->
    <div class="mt-6 mb-20 text-sm font-medium text-gray-600 dark:text-white/80">
        <div id="event_tab" class="uk-switcher bg-white border rounded-xl shadow-sm md:py-12 md:px-20 p-6 overflow-hidden dark:border-slate-700 dark:bg-dark2"> 
            
            <!-- All Events Tab -->
            <div>
                <div id="events-container" class="grid grid-cols-1 gap-6">
                    <!-- Event cards will be loaded here -->
                </div>

                <!-- Empty State -->
                <div id="empty-state" class="hidden text-center py-16">
                    <ion-icon name="calendar-outline" class="text-6xl text-gray-400 mb-4"></ion-icon>
                    <h3 class="text-xl font-semibold text-black dark:text-white mb-2">No events yet</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Get started by creating your first event</p>
                    <button type="button" class="button bg-primary text-white" uk-toggle="target: #add-event-modal">
                        Create Your First Event
                    </button>
                </div>
            </div>

            <!-- Upcoming Tab -->
            <div>
                <div id="upcoming-events-container" class="grid grid-cols-1 gap-6">
                    <!-- Upcoming event cards will be loaded here -->
                </div>
            </div>

            <!-- Featured Tab -->
            <div>
                <div id="featured-events-container" class="grid grid-cols-1 gap-6">
                    <!-- Featured event cards will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div class="hidden lg:p-20 max-lg:!items-start" id="add-event-modal" uk-modal="">
    <div class="uk-modal-dialog tt relative mx-auto bg-white shadow-xl rounded-lg max-lg:w-full dark:bg-dark2" style="max-width: 600px;">
        
        <!-- Modal Header -->
        <div class="p-3.5 border-b text-center text-sm font-semibold text-black dark:text-white dark:border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center">Create New Event</div>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="lg:max-h-[600px] max-h-[70vh] overflow-y-auto">
            <form id="event-form" class="space-y-6 p-6">
                
                <!-- Event Image Upload -->
                <div class="md:flex items-start gap-10">
                    <label class="md:w-32 text-right pt-2"> Event Image </label>
                    <div class="flex-1 max-md:mt-4">
                        <div class="relative w-full h-48 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden bg-gray-50 dark:bg-gray-800">
                            <label for="event_image" class="cursor-pointer w-full h-full flex flex-col items-center justify-center">
                                <img id="event_image_preview" src="" alt="" class="hidden w-full h-full object-cover">
                                <div id="upload_placeholder" class="text-center">
                                    <ion-icon name="cloud-upload-outline" class="text-4xl text-gray-400"></ion-icon>
                                    <p class="text-sm text-gray-500 mt-2">Click to upload image</p>
                                </div>
                                <input id="event_image" name="image" accept="image/*" type="file" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Event Title * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="title" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Description * </label>
                        <div class="flex-1 max-md:mt-4">
                            <textarea name="description" required rows="4" class="w-full"></textarea>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Venue * </label>
                        <div class="flex-1 max-md:mt-4">
                            <select name="venue_id" required class="w-full">
                                <option value="">Select a venue</option>
                                <!-- Venues will be loaded dynamically -->
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Event Type * </label>
                        <div class="flex-1 max-md:mt-4">
                            <select name="type" required class="w-full">
                                <option value="">Select type</option>
                                <option value="concert">Concert</option>
                                <option value="conference">Conference</option>
                                <option value="workshop">Workshop</option>
                                <option value="seminar">Seminar</option>
                                <option value="festival">Festival</option>
                                <option value="sports">Sports</option>
                                <option value="exhibition">Exhibition</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Genre </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="genre" class="w-full" placeholder="e.g., Rock, Jazz, Technology">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Start Time * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="datetime-local" name="start_time" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> End Time * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="datetime-local" name="end_time" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Entry Fee </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="entry_fee" step="0.01" min="0" class="w-full" placeholder="0.00">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Max Participants </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="max_participants" min="1" class="w-full" placeholder="Unlimited">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Options </label>
                        <div class="flex-1 max-md:mt-4">
                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Featured Event</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Highlight this event on the platform</p>
                                </div>
                                <input type="checkbox" name="is_featured"><span class="switch-button !relative"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1 uk-modal-close">Cancel</button>
                    <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Create Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Event Modal -->
<div class="hidden lg:p-20 max-lg:!items-start" id="edit-event-modal" uk-modal="">
    <div class="uk-modal-dialog tt relative mx-auto bg-white shadow-xl rounded-lg max-lg:w-full dark:bg-dark2" style="max-width: 600px;">
        
        <div class="p-3.5 border-b text-center text-sm font-semibold text-black dark:text-white dark:border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center">Edit Event</div>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
        </div>

        <div class="lg:max-h-[600px] max-h-[70vh] overflow-y-auto">
            <form id="edit-event-form" class="space-y-6 p-6">
                <input type="hidden" name="event_id" id="edit_event_id">
                
                <!-- Event Image Upload -->
                <div class="md:flex items-start gap-10">
                    <label class="md:w-32 text-right pt-2"> Event Image </label>
                    <div class="flex-1 max-md:mt-4">
                        <div class="relative w-full h-48 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden bg-gray-50 dark:bg-gray-800">
                            <label for="edit_event_image" class="cursor-pointer w-full h-full flex flex-col items-center justify-center">
                                <img id="edit_event_image_preview" src="" alt="" class="w-full h-full object-cover">
                                <input id="edit_event_image" name="image" accept="image/*" type="file" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Event Title * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="title" id="edit_title" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Description * </label>
                        <div class="flex-1 max-md:mt-4">
                            <textarea name="description" id="edit_description" required rows="4" class="w-full"></textarea>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Venue * </label>
                        <div class="flex-1 max-md:mt-4">
                            <select name="venue_id" id="edit_venue_id" required class="w-full">
                                <option value="">Select a venue</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Event Type * </label>
                        <div class="flex-1 max-md:mt-4">
                            <select name="type" id="edit_type" required class="w-full">
                                <option value="">Select type</option>
                                <option value="concert">Concert</option>
                                <option value="conference">Conference</option>
                                <option value="workshop">Workshop</option>
                                <option value="seminar">Seminar</option>
                                <option value="festival">Festival</option>
                                <option value="sports">Sports</option>
                                <option value="exhibition">Exhibition</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Genre </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="genre" id="edit_genre" class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Start Time * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="datetime-local" name="start_time" id="edit_start_time" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> End Time * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="datetime-local" name="end_time" id="edit_end_time" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Entry Fee </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="entry_fee" id="edit_entry_fee" step="0.01" min="0" class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Max Participants </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="max_participants" id="edit_max_participants" min="1" class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Options </label>
                        <div class="flex-1 max-md:mt-4">
                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Featured Event</h4>
                                </div>
                                <input type="checkbox" name="is_featured" id="edit_is_featured"><span class="switch-button !relative"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1 uk-modal-close">Cancel</button>
                    <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Update Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('ajax-scripts')
<script>
const URL = "{{ env('API_ROUTE_URL') }}";
const token = localStorage.getItem('auth_token');

$(document).ready(function() {
    
    // Image preview for add form
    $('#event_image').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#event_image_preview').attr('src', e.target.result).removeClass('hidden');
                $('#upload_placeholder').addClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Image preview for edit form
    $('#edit_event_image').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#edit_event_image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // Load venues for dropdown
    function loadVenues() {
        $.ajax({
            url: URL + "/venue",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "GET",
            success: function(response) {
                if(response.success && response.data) {
                    const venueSelects = $('select[name="venue_id"]');
                    venueSelects.each(function() {
                        const currentValue = $(this).val();
                        $(this).find('option:not(:first)').remove();
                        response.data.forEach(venue => {
                            $(this).append(`<option value="${venue.id}">${venue.name} - ${venue.city}</option>`);
                        });
                        console.log(response.data.length)
                        if(response.data.length == 0) {
                            $("#event_tab").addClass('hidden');
                            $("#MainEveBtn").addClass("hidden")
                            // $(this).append('<option value="">No venues available</option>');
                        }
                        if(currentValue) {
                            $(this).val(currentValue);
                        }
                    });
                }
            }
        });
    }

    loadVenues();

    // Load all events
    function loadEvents() {
        $.ajax({
            url: URL + "/event",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "GET",
            success: function(response) {
                if(response.success && response.data) {
                    displayEvents(response.data, '#events-container');
                    
                    // Filter upcoming events (start_time is in future)
                    const now = new Date();
                    const upcomingEvents = response.data.filter(e => new Date(e.start_time) > now);
                    displayEvents(upcomingEvents, '#upcoming-events-container');
                    
                    // Filter featured events
                    const featuredEvents = response.data.filter(e => e.is_featured);
                    displayEvents(featuredEvents, '#featured-events-container');
                    
                    if(response.data.length === 0) {
                        $('#empty-state').removeClass('hidden');
                        $('#events-container').addClass('hidden');
                    } else {
                        $('#empty-state').addClass('hidden');
                        $('#events-container').removeClass('hidden');
                    }
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Display events in container
    function displayEvents(events, containerSelector) {
        const container = $(containerSelector);
        container.empty();
        
        
        if(events.length === 0) {
            container.html('<p class="text-center text-gray-500 py-8">No events found</p>');
            return;
        }

        events.forEach(event => {
            const startDate = new Date(event.start_time);
            const endDate = new Date(event.end_time);
            const imageUrl = event.image ? getImageUrl(event.image) : 'assets/images/avatars/avatar-3.jpg';
            
            const eventCard = `
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 dark:bg-dark2 overflow-hidden">
                    <div class="md:flex gap-4">
                        <div class="md:w-48 h-48 shrink-0 bg-gradient-to-br from-blue-500 to-purple-600 relative">
                            <img src="${imageUrl}" alt="${event.title}" class="w-full h-full object-cover">
                            ${event.is_featured ? '<span class="absolute top-3 right-3 text-xs px-2 py-1 rounded-full bg-yellow-500 text-white">Featured</span>' : ''}
                        </div>
                        
                        <div class="flex-1 p-6">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="text-lg font-semibold text-black dark:text-white">${event.title}</h3>
                                    <div class="flex gap-2 mt-1">
                                        <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/20">${event.type}</span>
                                        ${event.genre ? `<span class="text-xs px-2 py-1 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/20">${event.genre}</span>` : ''}
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">${event.description}</p>
                            
                            <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400 mb-3">
                                <div class="flex items-center gap-2">
                                    <ion-icon name="location-outline"></ion-icon>
                                    <span>${event.venue?.name || 'Venue TBA'}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                    <span>${startDate.toLocaleDateString()} ${startDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <ion-icon name="time-outline"></ion-icon>
                                    <span>Ends: ${endDate.toLocaleDateString()} ${endDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
                                </div>
                                ${event.entry_fee ? `
                                <div class="flex items-center gap-2">
                                    <ion-icon name="cash-outline"></ion-icon>
                                    <span>Entry Fee: $${parseFloat(event.entry_fee).toFixed(2)}</span>
                                </div>` : ''}
                                ${event.max_participants ? `
                                <div class="flex items-center gap-2">
                                    <ion-icon name="people-outline"></ion-icon>
                                    <span>Max Participants: ${event.max_participants}</span>
                                </div>` : ''}
                            </div>

                            <div class="flex gap-2">
                                <button type="button" class="button bg-secondery flex-1 edit-event-btn" data-event-id="${event.id}">
                                    Edit
                                </button>
                                <button type="button" class="button bg-red-100 text-red-600 dark:bg-red-900/20 flex-1 delete-event-btn" data-event-id="${event.id}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.append(eventCard);
        });
    }

    function getImageUrl(path) {
        if (!path) return "assets/images/avatars/avatar-3.jpg";
        if (path.startsWith('http')) return path;
        return "{{ url('storage') }}/" + path.replace(/^public\//, '');
    }

    loadEvents();

    // Add event form submission
    $('#event-form').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData();
        
        // Append all text inputs
        formData.append("title", $('[name="title"]', this).val());
        formData.append("description", $('[name="description"]', this).val());
        formData.append("venue_id", $('[name="venue_id"]', this).val());
        formData.append("type", $('[name="type"]', this).val());
        formData.append("genre", $('[name="genre"]', this).val());
        formData.append("start_time", $('[name="start_time"]', this).val());
        formData.append("end_time", $('[name="end_time"]', this).val());
        formData.append("entry_fee", $('[name="entry_fee"]', this).val() || 0);
        formData.append("max_participants", $('[name="max_participants"]', this).val() || '');
        formData.append("is_featured", $('[name="is_featured"]', this).is(':checked') ? 1 : 0);

        // Append image file if selected
        const imageFile = $('#event_image')[0].files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }

        $.ajax({
            url: URL + "/event/add",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    UIkit.modal('#add-event-modal').hide();
                    $('#event-form')[0].reset();
                    $('#event_image_preview').addClass('hidden');
                    $('#upload_placeholder').removeClass('hidden');
                    loadEvents();
                    UIkit.notification({
                        message: 'Event created successfully!',
                        status: 'success',
                        pos: 'top-right',
                        timeout: 3000
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                UIkit.notification({
                    message: 'Error creating event',
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    });

    // Edit event button click
    $(document).on('click', '.edit-event-btn', function() {
        const eventId = $(this).data('event-id');
        
        $.ajax({
            url: URL + "/event/edit/" + eventId,
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "GET",
            success: function(response) {
                if(response.success && response.data) {
                    const event = response.data;
                    
                    $('#edit_event_id').val(event.id);
                    $('#edit_title').val(event.title);
                    $('#edit_description').val(event.description);
                    $('#edit_venue_id').val(event.venue_id);
                    $('#edit_type').val(event.type);
                    $('#edit_genre').val(event.genre);
                    
                    // Format datetime for input
                    const startTime = new Date(event.start_time);
                    const endTime = new Date(event.end_time);
                    $('#edit_start_time').val(formatDateTimeLocal(startTime));
                    $('#edit_end_time').val(formatDateTimeLocal(endTime));
                    
                    $('#edit_entry_fee').val(event.entry_fee);
                    $('#edit_max_participants').val(event.max_participants);
                    $('#edit_is_featured').prop('checked', event.is_featured);
                    
                    // Set image preview
                    if(event.image) {
                        $('#edit_event_image_preview').attr('src', getImageUrl(event.image));
                    }
                    
                    UIkit.modal('#edit-event-modal').show();
                }
            }
        });
    });

    // Format date for datetime-local input
    function formatDateTimeLocal(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    // Update event form submission
    $('#edit-event-form').on('submit', function(e) {
        e.preventDefault();

        const eventId = $('#edit_event_id').val();
        const formData = new FormData();
        
        formData.append("title", $('#edit_title').val());
        formData.append("description", $('#edit_description').val());
        formData.append("venue_id", $('#edit_venue_id').val());
        formData.append("type", $('#edit_type').val());
        formData.append("genre", $('#edit_genre').val());
        formData.append("start_time", $('#edit_start_time').val());
        formData.append("end_time", $('#edit_end_time').val());
        formData.append("entry_fee", $('#edit_entry_fee').val() || 0);
        formData.append("max_participants", $('#edit_max_participants').val() || '');
        formData.append("is_featured", $('#edit_is_featured').is(':checked') ? 1 : 0);
        formData.append("_method", "POST");

        // Append image file if selected
        const imageFile = $('#edit_event_image')[0].files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }

        $.ajax({
            url: URL + "/event/update/" + eventId,
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success) {
                    UIkit.modal('#edit-event-modal').hide();
                    loadEvents();
                    UIkit.notification({
                        message: 'Event updated successfully!',
                        status: 'success',
                        pos: 'top-right',
                        timeout: 3000
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                UIkit.notification({
                    message: 'Error updating event',
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    });

    // Delete event button click
    $(document).on('click', '.delete-event-btn', function() {
        const eventId = $(this).data('event-id');
        
        if(confirm('Are you sure you want to delete this event?')) {
            $.ajax({
                url: URL + "/event/delete/" + eventId,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "DELETE",
                success: function(response) {
                    if(response.success) {
                        loadEvents();
                        UIkit.notification({
                            message: 'Event deleted successfully!',
                            status: 'success',
                            pos: 'top-right',
                            timeout: 3000
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    UIkit.notification({
                        message: 'Error deleting event',
                        status: 'danger',
                        pos: 'top-right',
                        timeout: 3000
                    });
                }
            });
        }
    });
});
</script>
@endsection