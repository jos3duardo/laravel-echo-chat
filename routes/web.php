<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'RoomController@index')->middleware('auth');

Route::group([ 'prefix' => 'chat', 'as' => 'chat.', 'middleware'=> 'auth' ], function (){
    Route::resource('rooms', 'RoomController');
    Route::post('rooms/{room}/message','RoomController@createMessage')->name('rooms.create.message');
    Route::resource('message', 'MessageController');
});

