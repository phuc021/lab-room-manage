<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(App\Models\Devices::class, function (Faker $faker) {
    $names = array('CPU','RAM','HDD','Mainboard');
    shuffle($names);
    return [
        'name' => $names[0],
        'desc' => $faker->languageCode,
        'status' => $faker->year,
        'computers_id' => $faker->randomDigit,
        'type_devices_id' => $faker->randomDigit, 
        
    ];
});
