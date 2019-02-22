<?php

use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'team_id' => 1,
        'user_id' => $faker->randomElement([1 ,2, 3]),
        'birthday' => $faker->dateTimeThisCentury->format('d/m/Y'),
    ];
});