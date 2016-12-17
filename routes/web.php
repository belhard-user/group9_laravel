<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'profile'], function($route){
    $route->get('home', function(){
        return "hello home";
    });
    $route->get('edit', function(){
        return "hello edit";
    });
    $route->get('pwd', function(){
        return "hello pwd";
    });
});

Route::get('hello/{name?}/{from?}', function($name='Guset', $from='Admin'){
    return title_case("Hello $name from $from");
})->where([
    'name' => '\w+',
    'from' => '\w+'
]);


/*Route::match(['get', 'put', 'delete'], 'hello', function(){
    $names = [
        'Neo',
        'Morpheus',
        'Tank',
        'Trinity',
        'Dozer',
        'Smith'
    ];

    return $names;
});*/

Route::any('hello2', function(){
    $names = [
        'Neo',
        'Morpheus',
        'Tank',
        'Trinity',
        'Dozer',
        'Smith'
    ];

    $url = url('hello', [
        'name' => $names[ array_rand($names) ],
        'from' => $names[ array_rand($names) ]
    ]);

    return "<a href='$url'>click</a>";
});