<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'updated_at' => $faker->dateTimeBetween('-3 years','now')
    ];
});
