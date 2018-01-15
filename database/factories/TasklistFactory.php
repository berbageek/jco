<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Tasklist::class, function (Faker $faker) {
    return [
        'nama' => $faker->word,
    ];
});
