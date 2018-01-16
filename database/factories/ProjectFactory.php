<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Project::class, function (Faker $faker) {
    return [
        // 'client_id' => 1,
        'nama'      => sprintf('Proyek %s', $faker->word),
        'deskripsi' => $faker->paragraph,
    ];
});
