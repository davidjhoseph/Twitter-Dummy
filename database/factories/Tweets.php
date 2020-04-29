<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Tweets;

$factory->define(Tweets::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,12),
        'username'=>$faker->username,
        'name' => $faker->name,
        'file' => '',
        'content' => $faker->text(50),
    ];
});
