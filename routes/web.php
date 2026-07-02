<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Api\ExecutiveApiController;
use App\Http\Controllers\Api\EventCategoryApiController;

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
    | Calendar
    |--------------------------------------------------------------------------
    */

    Route::view('/calendar', 'events.index')
        ->name('calendar');

    /*
    |--------------------------------------------------------------------------
    | Events API
    |--------------------------------------------------------------------------
    */

    Route::resource('events', EventController::class)
        ->only([
            'index',
            'store',
            'update',
            'destroy',
        ]);

    /*
    |--------------------------------------------------------------------------
    | Lookup API
    |--------------------------------------------------------------------------
    */

    Route::prefix('api')->group(function () {

        Route::get('/executives', [ExecutiveApiController::class, 'index'])
            ->name('api.executives');

        Route::get('/categories', [EventCategoryApiController::class, 'index'])
            ->name('api.categories');

    });

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

});

require __DIR__.'/auth.php';