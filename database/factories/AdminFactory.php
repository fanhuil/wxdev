<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'username' => 'fanhuilin',
        'password' => bcrypt('admin888'),
        'name' => '范徽林',
    ];
});
