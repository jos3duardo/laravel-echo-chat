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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group([ 'prefix' => 'chat', 'as' => 'chat.', 'middleware'=> 'auth' ], function (){
    Route::resource('rooms', 'RoomController');
    Route::post('rooms/{room}/message','RoomController@createMessage')->name('rooms.create.message');
    Route::resource('message', 'MessageController');
});

