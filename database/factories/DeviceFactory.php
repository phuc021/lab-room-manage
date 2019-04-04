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

$factory->define(App\Models\Device::class, function (Faker $faker) {
    $names = array('CPU','RAM','HDD','Mainboard');
    $status = array('0', '1', '2');

    shuffle($names);
    shuffle( $status);
    return [
        'name' => $names[0],
        'desc' => $faker->safeColorName,
        'status' => $status[0],
        'computers_id' => $faker->randomDigit,
        'type_devices_id' => $faker->randomDigit, 
        
    ];
});
