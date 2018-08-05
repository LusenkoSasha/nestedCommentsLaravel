<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'text' => $faker->text,
    ];
});
