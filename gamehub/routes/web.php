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

Route::get('/game{id}', 'GameItemController@find')->name('game.find');

Route::get('/about-us', 'AboutUsController@show')->name('aboutus.show');
