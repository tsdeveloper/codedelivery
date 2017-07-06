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

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
     $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(1234567),
        'remember_token' => str_random(10),
         'img_src' =>  $faker->imageUrl($width = 200, $height = 200, 'people', true, 'Faker', true)
    ];
});

$factory->define(CodeDelivery\Models\Role::class, function (Faker\Generator $faker) {
     $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->word
        
    ];
});

$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {
     $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));

    return [
        'name' => $faker->jobTitle,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'barcode' => $faker->isbn13,
        'qtd' => $faker->randomNumber,
        'img_src' =>  $faker->imageUrl($width = 800, $height = 600, 'nightlife', true, 'Faker', true)
    ];
});


$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainName       
    ];
});


$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'address'  => $faker->address,      
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
        
    ];
});



$factory->define(CodeDelivery\Models\Order::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
       'client_id'  => rand(1,10),
        'total'  => rand(50,120),
        'status' => rand(0,7),
        'user_deliveryman_id' => $faker->randomElement($array = array(null, 12, 13),$count = 1)

    ];
});


$factory->define(CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
//        'price'  => $faker->randomFloat(2,0,0),
//        'qtd'  => $faker->randomDigitNotNull(),


    ];
});

$factory->define(CodeDelivery\Models\Cupom::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
	'description' => $faker->catchPhrase ,
		'validate'=> $faker->dateTimeInInterval($startDate = date_default_timezone_get(), $interval = '+ 5 days', $timezone = date_default_timezone_get()),//$faker->date($format = 'd-m-Y', $max = 'now'),
		'code' => substr($faker->md5,0,6),
		'price' => $faker->numberBetween($min=5,$max=90),
		'used' =>rand(0,1)

    ];
});