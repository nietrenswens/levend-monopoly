<?php

use App\Http\Controllers\ChanceController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\GebouwenController;
use App\Http\Controllers\StartcodesController;
use App\Http\Controllers\TaxController;
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

Route::get('buy/{gebouw}', [GebouwenController::class, 'buy'])->middleware(['auth'])->name('buy');
Route::get('buybuilding/{gebouw}/{belasting}', [GebouwenController::class, 'buybuilding'])->middleware(['auth'])
    ->name('buybuilding');
Route::get('startcode/{code}', [StartcodesController::class, 'claimStartcode'])->middleware(['auth'])
    ->name('claimStartcode');

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('/', [ManagementController::class, 'dashboard'])->name('index');

    Route::get('management', [ManagementController::class, 'index'])->name('management');

    Route::get('overview', [ManagementController::class, 'overview'])->name('overview');


    // Gamemaster Routes
    Route::group(['middleware' => ['is_gamemaster']], function() {
       Route::controller((TaxController::class))->name('tax.')->group(function() {
           Route::get('tax', [TaxController::class, 'index'])->name('index');
           Route::get('tax/manage/{user}', [TaxController::class, 'manage'])->name('manage');

           Route::post('tax/take', [TaxController::class, 'removeBuildingFromTeam'])->name('take');
       });

       Route::controller((ChanceController::class))->name('chance.')->group(function() {
           Route::get('chance', [ChanceController::class, 'index'])->name('index');
           Route::get('chance/take/{user}', [ChanceController::class, 'take'])->name('take');
       });
    });

    // Admin Routes
    Route::group(['middleware' => ['is_admin']], function() {
        Route::controller(UsersController::class)->name('users.')->group(function() {
            Route::get('users/create', 'create')->name('create');
            Route::get('users/delete', 'delete')->name('delete');
            Route::get('users/edit/{user}', 'edit')->name('edit');
            Route::get('users/askedit', 'askedit')->name('askedit');

            Route::post('users/update/{user}', 'update')->name('update');
            Route::post('users/store', 'store')->name('store');
            Route::post('users/destroy', 'destroy')->name('destroy');
        });

        Route::controller(GebouwenController::class)->name('gebouwen.')->group(function() {
            Route::get('gebouwen/create', 'create')->name('create');
            Route::get('gebouwen/delete', 'delete')->name('delete');
            Route::get('gebouwen/edit/{gebouw}', 'edit')->name('edit');
            Route::get('gebouwen/askedit', 'askedit')->name('askedit');

            Route::post('gebouwen/update/{gebouw}', 'update')->name('update');
            Route::post('gebouwen/store', 'store')->name('store');
            Route::post('gebouwen/destroy', 'destroy')->name('destroy');
        });

        Route::controller(StartcodesController::class)->name('startcodes.')->group(function() {
            Route::get('startcodes/create', 'create')->name('create');
            Route::get('startcodes/delete', 'delete')->name('delete');

            Route::post('startcodes/create', 'store')->name('store');
            Route::post('startcodes/destroy', 'destroy')->name('destroy');
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
