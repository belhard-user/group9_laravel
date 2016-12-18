<?php


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/{name}', 'HomeController@show');
