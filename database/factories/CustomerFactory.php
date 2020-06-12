<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'subsidiary_id' => $faker->numberBetween(2,4),
        'username' => $faker->name(),
        'address' => $faker->address(),
        'phone_number'=>$faker->e164PhoneNumber(),
    ];
});
