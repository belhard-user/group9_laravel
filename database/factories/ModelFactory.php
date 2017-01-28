<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Article::class, function(Faker\Generator $faker){
    return[
        'title' => $faker->words(rand(4, 10), true),
        'short_description' => $faker->realText(),
        'body' => $faker->text,
        'user_id' => 1
    ];
});
