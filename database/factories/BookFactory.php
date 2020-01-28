<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Book;

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

$factory->define(Book::class, function (Faker $faker) use ($factory) {
    return [
        'name' => $faker->name,
        'author_id' => $faker->numberBetween($min = 1, $max = 30), // or $factory->create(App\Author::class)->id
        'category_id' => $faker->numberBetween($min = 1, $max = 10), // $factory->create(App\Category::class)->id
        'publisher_id' => $faker->numberBetween($min = 1, $max = 10), // $factory->create(App\Publisher::class)->id
        'release' => $faker->date(),
        'license' => $faker->randomElement($array = array ('male', 'female')),
        'size' => $faker->numberBetween($min = 10, $max = 20),
        'font_size' => $faker->numberBetween($min = 9, $max = 16),
        'wrapper' => $faker->randomElement($array = array ('hard', 'soft')),
        'budget' => $faker->numberBetween($min = 1000, $max = 10000),
        'avatar' => 'https://i.pravatar.cc/300?u=' . $faker->safeEmail
    ];
});
