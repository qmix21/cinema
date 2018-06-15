<?php

use Faker\Generator as Faker;
use App\Cinemas;
$factory->define(Cinemas::class, function (Faker $faker) {
    return [
        'name'=>$faker->name(50),
        'address'=> $faker->address(25),
        'long'=> $faker->longitude(),
        'lat' => $faker->latitude(),

    ];
});
