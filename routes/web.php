<?php

Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function(){
    Route::get('home', ['uses' => 'IndexController@index', 'as' => 'profile.main']);
});

Route::get('hello', ['uses' =>'HelloController@index', 'as' => 'hello']);
Route::get('show/{name}', ['uses' => 'HelloController@show', 'as' => 'show.user.name']);


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/{name}', 'HomeController@show');

Route::group(['prefix' => 'db'], function($r){
    $r->get('insert', 'DBController@insert');
    $r->get('update', 'DBController@update');
    $r->get('delete', 'DBController@delete');
    $r->match(['get', 'post'], 'select', 'DBController@select');
});

