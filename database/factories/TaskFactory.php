<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Task::class, function (Faker $faker) {
    return [
        // 'tasklist_id' => 1,
        // 'assignee_id' => 1,
        // 'creator_id'  => 1,
        'subyek'      => $faker->sentence,
        'deskripsi'   => $faker->paragraph,
        'subtasks'    => $faker->words(3),
    ];
});
