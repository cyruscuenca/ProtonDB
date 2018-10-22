<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\PagesController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('throttle:120');;
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('timeline', 'PagesController@timeline')->name('timeline');
Route::get('donate', 'PagesController@donate')->name('donate');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('app/list', 'AppsController@list')->name('app.list');
Route::get('app/stats', 'AppsController@stats')->name('app.stats');
Route::get('app/{path_int}/{path_slug}', 'AppsController@show')->name('app.show');
Route::get('app/{path_int}/entry/create', 'EntriesController@create')->name('entry.create');
Route::post('app/{path_int}/entry/store', 'EntriesController@store')->name('entry.store');
Route::get('app/{path_int}/entry/{id}', 'EntriesController@show')->name('entry.show');
Route::get('app/{path_int}/entry/list', 'EntriesController@list')->name('entry.list');
Route::get('app/{path_int}/entry/{id}', 'EntriesController@show')->name('entry.show');
Route::get('app/search', 'AppsController@search')->name('app.search');
Route::get('app/best', 'AppsController@best')->name('app.best');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
