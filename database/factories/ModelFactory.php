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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(KingDelivery\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(KingDelivery\Models\Client::class, function(Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(KingDelivery\Models\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(KingDelivery\Models\Product::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10,50)
    ];
});

$factory->define(KingDelivery\Models\Order::class, function(Faker\Generator $faker) {
    return [
        'client_id' => rand(1,10),
        'status' => 0,
        'total' => $faker->numberBetween(50,100)
    ];
});

$factory->define(KingDelivery\Models\OrderItem::class, function(Faker\Generator $faker) {
    return [
        'product_id' => rand(1,50),
        'qtd' => rand(1,5),
        'price' => rand(10,30)
    ];
});

$factory->define(KingDelivery\Models\Cupom::class, function(Faker\Generator $faker) {
    return [
        'code' => rand(1000, 9999),
        'value' => rand(10,100)
    ];
});