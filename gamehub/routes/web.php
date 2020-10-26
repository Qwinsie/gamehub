<?php

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

    return view('game-items.index');
});

Route::get('about-us', 'AboutUsController@show')->name('about.show');

Route::prefix('games')->group(function(){

    Route::get('', 'App\Http\Controllers\GameItemController@show')->name('game');

    Route::name('game.')->middleware('auth')->group(function(){
        Route::get('create', 'GameItemController@create')   ->name('game.create');
        Route::post('store', 'GameItemController@store')     ->name('game.store');
        Route::get('{id}', 'GameItemController@show')       ->name('game.show');
    });
});

//Auth::routes();
