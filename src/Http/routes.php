<?php

Route::group(['prefix' => 'niceartisan'], function () {
    get('/{option?}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@show');
    post('item/{class}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@command');
    post('rest_item/{class}', '\FFogarasi\NiceArtisan\Http\Controllers\NiceArtisanController@command');
});