<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    return [
        // 'task_id'        => 1,
        // 'commentator_id' => 1,
        'konten'         => $faker->paragraph(2),
    ];
});
