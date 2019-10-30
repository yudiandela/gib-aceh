<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)
    ];
});
