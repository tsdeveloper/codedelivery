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

$factory->define(AgendaWeb\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(AgendaWeb\Models\Participante::class, function(Faker\Generator $faker){
    return [
        'nome' => $faker->name,
        'cpf' => str_random(10),
        'email' => $faker->companyEmail
    ];
});


$factory->define(AgendaWeb\Models\Categoria::class, function(Faker\Generator $faker){
    return [
        'descricao' => $faker->jobTitle,
        
    ];
});


$factory->define(AgendaWeb\Models\Estande::class, function(Faker\Generator $faker){
    return [
        'nome' => $faker->domainWord,
        'descricao' => $faker->company,
        'ativo' => true,
        
    ];
});