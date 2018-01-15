<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Profile::class, function (Faker $faker) {
    return [
        // "user_id"             => 1,
        "jenis_kelamin"       => $faker->randomElement(['L', 'P']),
        "tanggal_lahir"       => $faker->dateTimeBetween('-40 years', '-20 years'),
        "pendidikan_terakhir" => $faker->randomElement(['SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
        "status_pernikahan"   => $faker->randomElement(['BELUM_KAWIN', 'KAWIN']),
        "alamat"              => $faker->address,
        "nomor_hp"            => $faker->phoneNumber,
    ];
});
