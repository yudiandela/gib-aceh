<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Donation;
use App\User;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {

    $ota = User::all()->random();
    $paskas = User::all()->random();

    return [
        'ota_id'    => $ota->id,
        'paskas_id' => $paskas->id,
        'jumlah'    => rand(25000, 5000000),
        'type' => $faker->randomElement(['TUNAI', 'BANK'])
    ];
});
