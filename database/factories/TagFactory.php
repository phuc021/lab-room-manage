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

$factory->define(App\Models\Tag::class, function (Faker $faker) {
	$id_device = ['1','2','3','4','5','6','7','8','9','10'];
	$value = ['I5', '8GB', '500GB', '850W', 'MSI'];
	shuffle($value);
    return [
    	'value' => $value[0],
    	'devices_id' => $id_device[0]
    ];
});
