<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\GebouwenController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/management/', [ManagementController::class, 'index'])->middleware(['auth'])->name('management');
Route::get('/dashboard/overview', [ManagementController::class, 'overview'])->middleware(['auth']);

Route::resource('/dashboard/gebouwen', GebouwenController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
