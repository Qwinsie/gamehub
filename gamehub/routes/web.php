<?php

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

Route::get('/test', function () {

    Route::get('gamehub', 'App\Http\Controllers\GameController@index')->name('gamehub.index');
});


Route::prefix('gamehub')->group(function(){

    Route::get('', 'App\Http\Controllers\GameController@index')->name('gamehub.index');

    Route::name('game.')->middleware('auth')->group(function(){
        Route::get('create', 'App\Http\Controllers\GameController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\GameController@store')->name('store');
        Route::get('{id}', 'App\Http\Controllers\GameController@show')->name('show');
    });
});

Route::get('about-us', 'AboutUsController@index')->name('about.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
