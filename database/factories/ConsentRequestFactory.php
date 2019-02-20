<?php

use Faker\Generator as Faker;

$factory->define(App\ConsentRequest::class, function (Faker $faker) {
    return [
        'consent_id' => \App\Consent::all()->random(1)->first()->id,
        'user_id' => $faker->randomElement([1 ,2, 3]),
        'patient_id' => \App\Patient::all()->random(1)->first()->id,
    ];
});
