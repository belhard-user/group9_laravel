<?php

Route::get('xxx-app', function(\App\Xxx\iXxx $b){
    Bar::foo2()->foo2()->foo3();

    die;
});

Route::get('test', function(){
    dd(session()->all());
    // forget('key') -> unset($_SESSION['key'])
});

Auth::routes();

Route::group(['namespace' => 'Article', 'prefix' => 'news'], function($r){
    $r->get('/', ['uses' => 'IndexController@index', 'as' => 'article.index']);
    $r->get('create', ['uses' => 'IndexController@create', 'as' => 'article.create'])->middleware('auth');
    $r->get('/{article}', ['uses' => 'IndexController@show', 'as' => 'article.show']);
    $r->get('/{article}/edit', ['uses' => 'IndexController@edit', 'as' => 'article.edit']);
    $r->delete('/{image}/delete', ['uses' => 'IndexController@deleteImage', 'as' => 'article.delete']);
    $r->post('store', ['uses' => 'IndexController@store', 'as' => 'article.store']);
    $r->put('/{article}/update', ['uses' => 'IndexController@update', 'as' => 'article.update']);
});


Route::get('/', 'HomeController@index');
Route::get('/{name}', 'HomeController@show'); // /news

