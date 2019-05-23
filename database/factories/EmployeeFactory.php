<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Company;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => Company::all()->random()->id,
        'email' => $faker->unique()->companyEmail,
        'phone' => $faker->e164PhoneNumber,
    ];
});
