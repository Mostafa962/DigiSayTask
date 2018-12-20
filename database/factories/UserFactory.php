<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
	        'name'				=> $faker->name,
	        'email' 			=> $faker->unique()->safeEmail,
	        'email_verified_at' => now(),
	        'password' 			=> '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
	        'remember_token' 	=> str_random(10),
    ];
});
//Insert dummy Data To Clients Table
$factory->define(App\Client::class, function (Faker $faker) {
    return [
	      'title' 			=> $faker->sentence(3),
	      'description'		=> $faker->sentence(10),
	      'status'			=> $faker->sentence(5),
	      'contact_phone'	=> $faker->e164PhoneNumber,
	      'contract_start'	=> $faker->date('Y-m-d'),
	      'contract_end'	=> $faker->date('Y-m-d'),
    ];
});
//Insert dummy Data To Services Table
$factory->define(App\Service::class, function (Faker $faker) {
    return [
	      'title' 			=> $faker->sentence(3),
	      'type'			=> $faker->sentence(5),
	      'link'			=> $faker->sentence(5),
	      'description'		=> $faker->sentence(10),
	      'client_id'		=> function () {return factory(App\Client::class)->create()->id;}

    ];
});
