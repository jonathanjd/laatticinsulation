<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */


$factory->define(App\Category::class, function (Faker $faker) {
    $word = $faker->sentence(3);
    return [
        'name' => $word,
        'permalink' => str_slug($word),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    $word = $faker->sentence(3);
    return [
        'title' => $word,
        'permalink' => str_slug($word),
        'body' => $faker->text(200),
        'user_id' => 1
    ];
});
