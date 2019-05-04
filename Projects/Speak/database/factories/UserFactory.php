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
$months = [];

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'surname'   => $faker->lastName,
        'last_name' => $faker->lastName,
        'email'     => $faker->email,
        'phone'     => $faker->phoneNumber,
        'gender'    => $faker->numberBetween($min = 0, $max = 1),
        'day'       => $faker->dayOfMonth,
        'month'     => $faker->month,
        'year'      => $faker->year,
        'is_admin'  => 0
    ];
});
