<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Calendar Page
    |--------------------------------------------------------------------------
    */

    Route::view('/calendar', 'events.index')
        ->name('calendar');

    /*
    |--------------------------------------------------------------------------
    | Events API
    |--------------------------------------------------------------------------
    */

    Route::get('/events', [EventController::class, 'index'])
        ->name('events.index');

    Route::post('/events', [EventController::class, 'store'])
        ->name('events.store');

    Route::put('/events/{event}', [EventController::class, 'update'])
        ->name('events.update');

    Route::delete('/events/{event}', [EventController::class, 'destroy'])
        ->name('events.destroy');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::get('/', function () {
    return view('welcome');
});

Route::view('/test', 'test');
});

require __DIR__.'/auth.php';