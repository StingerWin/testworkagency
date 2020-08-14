<?php

use Faker\Generator as Faker;
use \Illuminate\Support\Facades\Auth;

$factory->define(\App\Employee::class, function (Faker $faker) {
    $position = \App\Position::pluck('id')->random();
    $faker->addProvider(new \Faker\Provider\uk_UA\PhoneNumber($faker));

    $employees = \App\Employee::all();
    $employee = !$employees->isEmpty() ? $employees->pluck('id')->random() : null;

    $user = \App\User::pluck('id')->random();

    return [
        'name' => $faker->name(),
        'position_id' => $position,
        'date' => $faker->dateTimeBetween('2018-01-01', now(), 'Europe/Kiev'),
        'phone_number' => '+38'.str_replace('+38', '', $faker->phoneNumber),
        'email' => $faker->email,
        'head_id' => $employee,
        'salary' => $faker->randomFloat('2', 100, 500),
        'created_user_id' => $user,
        'updated_user_id' => $user,
    ];
});
