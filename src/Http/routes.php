<?php

Route::group(['prefix' => 'niceartisan'], function () {
    Route::get('/{option?}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@show');
    Route::post('item/{class}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@command');
    Route::post('rest_item/{class}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@command');
});