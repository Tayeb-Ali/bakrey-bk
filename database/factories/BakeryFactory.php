<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bakery;
use Faker\Generator as Faker;

$factory->define(Bakery::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'address' => $faker->word,
        'status' => $faker->word,
        'reason' => $faker->text,
        'type' => $faker->word,
        'report_by' => $faker->randomDigitNotNull,
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s')
    ];
});
