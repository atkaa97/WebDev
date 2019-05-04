<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->paragraphs(rand(1, 3), true),
        'user_id' => $faker->numberBetween($min = 1, $max = 7),
        'category_id' => $faker->numberBetween($min = 1, $max = 4)
    ];
});
