<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Tweets;

$factory->define(Tweets::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'body' => $faker->text(200)
    ];
});
