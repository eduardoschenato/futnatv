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

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::prefix("canais")->group(function () {
        Route::get("", "ChannelController@index")->name("channels-list");
        Route::get("novo", "ChannelController@create")->name("channels-create");
        Route::post("", "ChannelController@store")->name("channels-store");
        Route::get("{id}", "ChannelController@edit")->name("channels-edit");
        Route::put("{id}", "ChannelController@update")->name("channels-update");
        Route::delete("{id}", "ChannelController@destroy")->name("channels-destroy");
    });
    
    Route::prefix("jogos")->group(function () {
        Route::get("", "MatchController@index")->name("matches-list");
        Route::get("novo", "MatchController@create")->name("matches-create");
        Route::post("", "MatchController@store")->name("matches-store");
        Route::get("{id}", "MatchController@edit")->name("matches-edit");
        Route::put("{id}", "MatchController@update")->name("matches-update");
        Route::delete("{id}", "MatchController@destroy")->name("matches-destroy");
    });
    
    Route::prefix("usuarios")->group(function () {
        Route::get("", "UserController@index")->name("users-list");
        Route::get("novo", "UserController@create")->name("users-create");
        Route::post("", "UserController@store")->name("users-store");
        Route::get("{id}", "UserController@edit")->name("users-edit");
        Route::put("{id}", "UserController@update")->name("users-update");
        Route::delete("{id}", "UserController@destroy")->name("users-destroy");
    });
});

Auth::routes();
