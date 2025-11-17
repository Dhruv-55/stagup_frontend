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
        <h1> Venues </h1>
    </div>
    
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 dark:bg-dark2">
        
        <div class="flex md:gap-8 gap-4 items-center md:p-10 p-6">
            <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0"> 
                <img id="venueImg" src="assets/images/avatars/avatar-3.jpg" class="object-cover w-full h-full rounded-full" alt=""/>
            </div>

            <div class="flex-1">
                <h3 class="md:text-xl text-base font-semibold text-black dark:text-white" id="headingText">My Venues</h3>
                <p class="text-sm text-blue-600 mt-1 font-normal" id="subHeadingText">Manage your venues</p>
            </div>

            <div>
                <button type="button" class="button bg-primary text-white flex items-center gap-2" uk-toggle="target: #add-venue-modal">
                    <ion-icon name="add-outline" class="text-xl"></ion-icon>
                    <span class="max-md:hidden">Add Venue</span>
                </button>
            </div>
        </div>
            
        <hr class="border-t border-gray-100 dark:border-slate-700">
        
        <!-- nav tabs -->
        <div class="relative -mb-px px-2" tabindex="-1" uk-slider="finite: true">
            <nav class="overflow-hidden rounded-xl uk-slider-container pt-2">
                <ul class="uk-slider-items w-[calc(100%+10px)] capitalize font-semibold text-gray-500 text-sm dark:text-white" 
                    uk-switcher="connect: #venue_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"> 
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> All Venues </a> </li>
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> Verified</a> </li>
                    <li class="w-auto pr-2.5"> <a href="#" class="inline-block p-4 pt-2 border-b-2 border-transparent aria-expanded:text-blue-500 aria-expanded:border-blue-500"> Available</a> </li>
                </ul>
            </nav>
            <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2.5 justify-start rounded-xl bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="previous"> <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon> </a>
            <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2.5 justify-end rounded-xl bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="next">  <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon> </a>
        </div>
    </div>

    <!-- tab content -->
    <div class="mt-6 mb-20 text-sm font-medium text-gray-600 dark:text-white/80">
        <div id="venue_tab" class="uk-switcher bg-white border rounded-xl shadow-sm md:py-12 md:px-20 p-6 overflow-hidden dark:border-slate-700 dark:bg-dark2"> 
            
            <!-- All Venues Tab -->
            <div>
                <div id="venues-container" class="grid grid-cols-1 gap-6">
                    <!-- Venue cards will be loaded here -->
                </div>

                <!-- Empty State -->
                <div id="empty-state" class="hidden text-center py-16">
                    <ion-icon name="business-outline" class="text-6xl text-gray-400 mb-4"></ion-icon>
                    <h3 class="text-xl font-semibold text-black dark:text-white mb-2">No venues yet</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Get started by adding your first venue</p>
                    <button type="button" class="button bg-primary text-white" uk-toggle="target: #add-venue-modal">
                        Add Your First Venue
                    </button>
                </div>
            </div>

            <!-- Verified Tab -->
            <div>
                <div id="verified-venues-container" class="grid grid-cols-1 gap-6">
                    <!-- Verified venue cards will be loaded here -->
                </div>
            </div>

            <!-- Available Tab -->
            <div>
                <div id="available-venues-container" class="grid grid-cols-1 gap-6">
                    <!-- Available venue cards will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Venue Modal -->
<div class="hidden lg:p-20 max-lg:!items-start" id="add-venue-modal" uk-modal="">
    <div class="uk-modal-dialog tt relative mx-auto bg-white shadow-xl rounded-lg max-lg:w-full dark:bg-dark2">
        
        <!-- Modal Header -->
        <div class="p-3.5 border-b text-center text-sm font-semibold text-black dark:text-white dark:border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center">Add New Venue</div>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="lg:max-h-[600px] max-h-[70vh] overflow-y-auto">
            <form id="venue-form" class="space-y-6 p-6">
                
                <div class="space-y-6">
                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Venue Name * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="name" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Description * </label>
                        <div class="flex-1 max-md:mt-4">
                            <textarea name="description" required rows="4" class="w-full"></textarea>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Address * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="address" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> City * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="city" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> State * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="state" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Country * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="country" required class="w-full">
                        </div>
                    </div>


                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Pincode * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="pincode" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Capacity * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="capacity" required min="1" class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Email  </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="email" name="contact_email"  class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Phone * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="tel" name="contact_phone" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Status </label>
                        <div class="flex-1 max-md:mt-4 space-y-3">
                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Verified Venue</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Mark this venue as verified</p>
                                </div>
                                <input type="checkbox" name="is_verified"><span class="switch-button !relative"></span>
                            </label>

                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Available for Booking</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Allow users to book this venue</p>
                                </div>
                                <input type="checkbox" name="is_available" checked><span class="switch-button !relative"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1 uk-modal-close">Cancel</button>
                    <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Save Venue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Venue Modal -->
<div class="hidden lg:p-20 max-lg:!items-start" id="edit-venue-modal" uk-modal="">
    <div class="uk-modal-dialog tt relative mx-auto bg-white shadow-xl rounded-lg max-lg:w-full dark:bg-dark2">
        
        <div class="p-3.5 border-b text-center text-sm font-semibold text-black dark:text-white dark:border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center">Edit Venue</div>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>
        </div>

        <div class="lg:max-h-[600px] max-h-[70vh] overflow-y-auto">
            <form id="edit-venue-form" class="space-y-6 p-6">
                <input type="hidden" name="venue_id" id="edit_venue_id">
                
                <div class="space-y-6">
                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Venue Name * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="name" id="edit_name" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Description * </label>
                        <div class="flex-1 max-md:mt-4">
                            <textarea name="description" id="edit_description" required rows="4" class="w-full"></textarea>
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Address * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="address" id="edit_address" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> City * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="city" id="edit_city" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> State * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="state" id="edit_state" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Country * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="text" name="country" id="edit_country" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Pincode * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="pincode" id="edit_pincode" required min="1" class="w-full">
                        </div>
                    </div>
                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Capacity * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="number" name="capacity" id="edit_capacity" required min="1" class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Email * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="email" name="contact_email" id="edit_contact_email" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Phone * </label>
                        <div class="flex-1 max-md:mt-4">
                            <input type="tel" name="contact_phone" id="edit_contact_phone" required class="w-full">
                        </div>
                    </div>

                    <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Status </label>
                        <div class="flex-1 max-md:mt-4 space-y-3">
                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Verified Venue</h4>
                                </div>
                                <input type="checkbox" name="is_verified" id="edit_is_verified"><span class="switch-button !relative"></span>
                            </label>

                            <label class="switch flex justify-between items-start gap-4 cursor-pointer">
                                <div>
                                    <h4 class="font-medium text-sm">Available for Booking</h4>
                                </div>
                                <input type="checkbox" name="is_available" id="edit_is_available"><span class="switch-button !relative"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <button type="button" class="button lg:px-6 bg-secondery max-md:flex-1 uk-modal-close">Cancel</button>
                    <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1">Update Venue</button>
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
    
    // Load all venues
    function loadVenues() {
        $.ajax({
            url: URL + "/venue",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "GET",
            success: function(response) {
                if(response.success && response.data) {
                    displayVenues(response.data, '#venues-container');
                    displayVenues(response.data.filter(v => v.is_verified), '#verified-venues-container');
                    displayVenues(response.data.filter(v => v.is_available), '#available-venues-container');
                    
                    if(response.data.length === 0) {
                        $('#empty-state').removeClass('hidden');
                        $('#venues-container').addClass('hidden');
                    } else {
                        $('#empty-state').addClass('hidden');
                        $('#venues-container').removeClass('hidden');
                    }
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Display venues in container
    function displayVenues(venues, containerSelector) {
        const container = $(containerSelector);
        container.empty();
        
        if(venues.length === 0) {
            container.html('<p class="text-center text-gray-500 py-8">No venues found</p>');
            return;
        }

        venues.forEach(venue => {
            const venueCard = `
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm dark:border-slate-700 dark:bg-dark2 p-6">
                    <div class="flex gap-4">
                        <div class="relative w-20 h-20 shrink-0 rounded-lg overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                            <ion-icon name="business-outline" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-4xl text-white opacity-50"></ion-icon>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-2">
                                <h3 class="text-lg font-semibold text-black dark:text-white">${venue.name}</h3>
                                <div class="flex gap-2">
                                    ${venue.is_verified ? '<span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-600 dark:bg-green-900/20">Verified</span>' : ''}
                                    ${venue.is_available ? '<span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/20">Available</span>' : ''}
                                </div>
                            </div>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">${venue.description}</p>
                            
                            <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex items-center gap-2">
                                    <ion-icon name="location-outline"></ion-icon>
                                    <span>${venue.city}, ${venue.state}, ${venue.country}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <ion-icon name="people-outline"></ion-icon>
                                    <span>Capacity: ${venue.capacity}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <span>${venue.contact_email}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <ion-icon name="call-outline"></ion-icon>
                                    <span>${venue.contact_phone}</span>
                                </div>
                            </div>

                            <div class="flex gap-2 mt-4">
                                <button type="button" class="button bg-secondery flex-1 edit-venue-btn" data-venue-id="${venue.id}">
                                    Edit
                                </button>
                                <button type="button" class="button bg-red-100 text-red-600 dark:bg-red-900/20 flex-1 delete-venue-btn" data-venue-id="${venue.id}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.append(venueCard);
        });
    }

    loadVenues();

    // Add venue form submission
    $('#venue-form').on('submit', function(e) {
        e.preventDefault();

        const formData = {
            name: $('[name="name"]', this).val(),
            description: $('[name="description"]', this).val(),
            address: $('[name="address"]', this).val(),
            city: $('[name="city"]', this).val(),
            state: $('[name="state"]', this).val(),
            pin_code: $('[name="pincode"]', this).val(),
            country: $('[name="country"]', this).val(),
            capacity: $('[name="capacity"]', this).val(),
            contact_email: $('[name="contact_email"]', this).val(),
            contact_phone: $('[name="contact_phone"]', this).val(),
            is_verified: $('[name="is_verified"]', this).is(':checked') ? 1 : 0,
            is_available: $('[name="is_available"]', this).is(':checked') ? 1 : 0

        };

        $.ajax({
            url: URL + "/venue/add",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "POST",
            data: formData,
            success: function(response) {
                if(response.success) {
                    UIkit.modal('#add-venue-modal').hide();
                    $('#venue-form')[0].reset();
                    loadVenues();
                    UIkit.notification({
                        message: 'Venue added successfully!',
                        status: 'success',
                        pos: 'top-right',
                        timeout: 3000
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                UIkit.notification({
                    message: 'Error adding venue',
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    });

    // Edit venue button click
    $(document).on('click', '.edit-venue-btn', function() {
        const venueId = $(this).data('venue-id');
        
        $.ajax({
            url: URL + "/venue/edit/" + venueId,
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "GET",
            success: function(response) {
                if(response.success && response.data) {
                    const venue = response.data;
                    $('#edit_venue_id').val(venue.id);
                    $('#edit_name').val(venue.name);
                    $('#edit_description').val(venue.description);
                    $('#edit_address').val(venue.address);
                    $('#edit_city').val(venue.city);
                    $('#edit_state').val(venue.state);
                    $('#edit_country').val(venue.country);
                    $('#edit_capacity').val(venue.capacity);
                    $('#edit_contact_email').val(venue.contact_email);
                    $('#edit_contact_phone').val(venue.contact_phone);
                    $('#edit_is_verified').prop('checked', venue.is_verified);
                    $('#edit_is_available').prop('checked', venue.is_available);
                    $('#edit_pincode').val(venue.pin_code);
                    UIkit.modal('#edit-venue-modal').show();
                }
            }
        });
    });

    // Update venue form submission
    $('#edit-venue-form').on('submit', function(e) {
        e.preventDefault();

        const venueId = $('#edit_venue_id').val();
        const formData = {
            name: $('#edit_name').val(),
            description: $('#edit_description').val(),
            address: $('#edit_address').val(),
            city: $('#edit_city').val(),
            state: $('#edit_state').val(),
            pin_code: $('#edit_pincode').val(),
            country: $('#edit_country').val(),
            capacity: $('#edit_capacity').val(),
            contact_email: $('#edit_contact_email').val(),
            contact_phone: $('#edit_contact_phone').val(),
            is_verified: $('#edit_is_verified').is(':checked') ? 1 : 0,
            is_available: $('#edit_is_available').is(':checked') ? 1 : 0
        };

        $.ajax({
            url: URL + "/venue/update/" + venueId,
            headers: {
                'Authorization': 'Bearer ' + token
            },
            type: "PUT",
            data: formData,
            success: function(response) {
                if(response.success) {
                    UIkit.modal('#edit-venue-modal').hide();
                    loadVenues();
                    UIkit.notification({
                        message: 'Venue updated successfully!',
                        status: 'success',
                        pos: 'top-right',
                        timeout: 3000
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                UIkit.notification({
                    message: 'Error updating venue',
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    });

    // Delete venue button click
    $(document).on('click', '.delete-venue-btn', function() {
        const venueId = $(this).data('venue-id');
        
        if(confirm('Are you sure you want to delete this venue?')) {
            $.ajax({
                url: URL + "/venue/delete/" + venueId,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: "DELETE",
                success: function(response) {
                    if(response.success) {
                        loadVenues();
                        UIkit.notification({
                            message: 'Venue deleted successfully!',
                            status: 'success',
                            pos: 'top-right',
                            timeout: 3000
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    UIkit.notification({
                        message: 'Error deleting venue',
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