<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('', [App\Http\Controllers\GameController::class, 'index'])->name('gamehub.index');

Route::any ( '/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::prefix('gamehub')->group(function(){

    Route::get('', [App\Http\Controllers\GameController::class, 'index'])->name('gamehub.index');

    Route::name('game.')->middleware('auth')->group(function(){
        Route::get('create', [App\Http\Controllers\GameController::class, 'create'])->name('create');
        Route::post('store', [App\Http\Controllers\GameController::class, 'store'])->name('store');
        Route::get('{game}', [App\Http\Controllers\GameController::class, 'show'])->name('show');
        Route::post('{game}/update', [App\Http\Controllers\GameController::class, 'update'])->middleware('can:edit-game,game')->name('update');
        Route::get('{game}/edit', [App\Http\Controllers\GameController::class, 'edit'])->middleware('can:edit-game,game')->name('edit');
        Route::get('{game}/delete', [App\Http\Controllers\GameController::class, 'delete'])->middleware('can:edit-game,game')->name('delete');
        Route::post( '/games/{game}/like', [App\Http\Controllers\GameLikesController::class, 'storeLike'])->name('store.like');
        Route::delete( '/games/{game}/like', [App\Http\Controllers\GameLikesController::class, 'destroy'])->name('store.like');
    });

});
Route::prefix('gamehub/profile')->name('profile.')->group(function(){
    Route::get('{profile}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('can:edit-profile,profile')->name('edit');
    Route::post('{profile}/update', [App\Http\Controllers\ProfileController::class, 'update'])->middleware('can:edit-profile,profile')->name('update');
    Route::get('{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('show');

});


Route::get('about-us', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
