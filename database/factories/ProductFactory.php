<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1,50),
        'subsidiary_id'=>$faker->numberBetween(2,4),
        'progress' => $faker->numberBetween(0,100),
        'status'=>$faker->randomElement(['completed','pending']),
        'photo'=>'app-assets/images/avatar.jpg',
    ];
});
