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
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
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