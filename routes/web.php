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

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('/', function() {
        return view('dashboard');
    })->name('index');

    Route::get('/management/', [ManagementController::class, 'index'])->name('management');

    Route::get('/overview', [ManagementController::class, 'overview'])->name('overview');

    Route::resource('/users', UsersController::class);

    Route::resource('/gebouwen', GebouwenController::class);
});

require __DIR__.'/auth.php';
