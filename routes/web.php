<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\GebouwenController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware(['guest']);

Route::get('buy/{uuid}', [GebouwenController::class, 'buy'])->middleware(['auth'])->name('buy');
Route::get('buybuilding/{uuid}/{belasting}', [GebouwenController::class, 'buybuilding'])->middleware(['auth'])->name('buybuilding');

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('/', function() {
        return view('dashboard');
    })->name('index');

    Route::get('management', [ManagementController::class, 'index'])->name('management');

    Route::get('overview', [ManagementController::class, 'overview'])->name('overview');


    # Admin Routes
    Route::group(['middleware' => ['is_admin']], function() {
        Route::controller(UsersController::class)->name('users.')->group(function() {
            Route::get('users/create', 'create')->name('create');
            Route::get('users/delete', 'delete')->name('delete');
            Route::get('users/edit/{id}', 'edit')->name('edit');
            Route::get('users/askedit', 'askedit')->name('askedit');

            Route::post('users/update/{id}', 'update')->name('update');
            Route::post('users/store', 'store')->name('store');
            Route::post('users/destroy', 'destroy')->name('destroy');
        });

        Route::controller(GebouwenController::class)->name('gebouwen.')->group(function() {
            Route::get('gebouwen/create', 'create')->name('create');
            Route::get('gebouwen/delete', 'delete')->name('delete');
    
            Route::post('gebouwen/store', 'store')->name('store');
            Route::post('gebouwen/destroy', 'destroy')->name('destroy');
        });
    });

});

// Route::group(['middleware' => 'auth'], function () {
//     Route::group(['prefix' => 'dashboard', 'middleware'=> 'admin'], function () {
//         Route::get('users', [UsersController::class, 'index'])->name('users.index');
//         Route::get('gebouwen', [GebouwenController::class, 'index'])->name('gebouwen.index');
//     });
// });

require __DIR__.'/auth.php';
