<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'request_on' => $faker->word,
        'arrival_on' => $faker->word,
        'quota' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'agency_id' => $faker->randomDigitNotNull,
        'size' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'driver_id' => $faker->randomDigitNotNull,
        'subtotal' => $faker->randomDigitNotNull,
        'delivery_fees' => $faker->randomDigitNotNull,
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s')
    ];
});
