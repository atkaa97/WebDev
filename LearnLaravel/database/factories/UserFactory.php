<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $faker->numberBetween($min = 15, $max = 70),
        'password' => Hash::make('asdasd'),
    ];
});
