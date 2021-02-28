<?php

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

// 生成模拟数据的工厂格式
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'truename' => $faker->name(),
        'password' => bcrypt('admin888'),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'sex' => ['男','女'][rand(0,1)]
    ];
});
