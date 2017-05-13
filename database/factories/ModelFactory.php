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

$factory->define(BrindaBrasil\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
         'img_src' =>  $faker->imageUrl($width = 200, $height = 200, 'people', true, 'Faker', true)
    ];
});

$factory->define(BrindaBrasil\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'barcode' => $faker->isbn13,
        'qtd' => $faker->randomNumber,
        'img_src' =>  $faker->imageUrl($width = 800, $height = 600, 'nightlife', true, 'Faker', true)
    ];
});


$factory->define(BrindaBrasil\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainName       
    ];
});


$factory->define(BrindaBrasil\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'address'  => $faker->address,      
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
        
    ];
});