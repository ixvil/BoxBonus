<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    return [
        'balance' => rand(0, 400),
        'walletId' => rand(100000000, 999999999)
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $email = $faker->email;
    return [
        'name' => $faker->name,
        'email' => $email,
        'phone' => rand(79000000000, 79999999999),
        'password' => hash('sha256', $email)
    ];
});

$factory->define(App\Models\Partner::class, function (Faker\Generator $faker) {
    return [
        'partner_categories_id' => 1,
        'name' => $faker->company,
        'location' => $faker->streetAddress,
        'description' => $faker->realText()
    ];
});

$factory->define(App\Models\Gift::class, function (Faker\Generator $faker) {
    return [
        'partner_id' => rand(1, 10),
        'name' => $faker->word,
        'description' => $faker->realText(),
        'price' => rand(1, 5) * 25

    ];
});