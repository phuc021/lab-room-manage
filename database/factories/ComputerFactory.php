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
$factory->define(App\Models\Computer::class, function (Faker $faker) {
	$names = array('1','2','3','4','5','6','7','8','9','10',
		'11','12','13','14','15','16','17','18','19','20');
	shuffle($names);
    return [
        'name' => $names[0],
        'desc' => $faker->languageCode,
        'status' => $faker->year,
        'rooms_id' => $faker->randomDigit,
    ];
});
