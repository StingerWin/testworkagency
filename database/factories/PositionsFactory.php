<?php

use Faker\Generator as Faker;
use \Illuminate\Support\Facades\Auth;

$factory->define(\App\Position::class, function (Faker $faker) {
    $user = \App\User::pluck('id')->random();

    return [
        'name' => $faker->jobTitle,
        'created_user_id' => $user,
        'updated_user_id' => $user,
    ];
});
