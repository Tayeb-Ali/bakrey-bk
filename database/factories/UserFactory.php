<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'mobile' => $faker->word,
        'role' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'areas' => $faker->word,
        'password' => $faker->word,
        'api_token' => $faker->word,
        'remember_token' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
