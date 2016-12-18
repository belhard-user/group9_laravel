<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function(){
    Route::get('home', ['uses' => 'IndexController@index', 'as' => 'profile.main']);
});

Route::get('hello', ['uses' =>'HelloController@index', 'as' => 'hello']);
Route::get('show/{name}', ['uses' => 'HelloController@show', 'as' => 'show.user.name']);