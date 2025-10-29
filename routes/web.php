<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\Organizer\PageController as OrganizerPageController;


Route::group(["controller" => AuthController::class], function () {
    Route::get('register', 'register')->name('register');
    Route::get('', 'login')->name('login');
});
// Route::middleware('auth')->group(function () {
    Route::get('/home', [PageController::class, 'home'])->name('home');
    Route::group(["controller" => PageController::class], function () {
        Route::get('profile/{id?}', 'profile')->name('profile');
        Route::get('profile-setting', 'profileSetting')->name('profile-setting');
        Route::get('people/{id?}', 'people')->name('people');
        Route::get('explore', 'explore')->name('explore');
        Route::get('message', 'message')->name('message');
    });

    Route::group(["controller" => OrganizerPageController::class], function () {
        Route::get('venues', 'venues')->name('venues');
        Route::get('event', 'event')->name('event');
    });

// });
