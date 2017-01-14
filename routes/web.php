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
    $r->get('has-many', 'DBController@hasMany');
    $r->get('relation', 'DBController@relation');
    $r->get('relation/{user}', 'DBController@relationUser');
    $r->get('update', 'DBController@update');
    $r->get('delete', 'DBController@delete');
    $r->match(['get', 'post'], 'select', 'DBController@select');
    $r->post('select/store', ['uses' => 'DBController@store', 'as' => 'db.store']);
    $r->get('select/show/{people}', ['uses' => 'DBController@show', 'as' => 'db.show']);
    $r->get('select/{people}/change', ['uses' => 'DBController@change', 'as' => 'db.change']);
    $r->put('select/{people}/modify', ['uses' => 'DBController@modify', 'as' => 'db.mod']);
});

