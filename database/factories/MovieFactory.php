<?php

use Faker\Generator as Faker;
use App\Movies;
$factory->define(Movies::class, function (Faker $faker) {
    return [
        'title'=>$faker->title(50),

    ];
});
