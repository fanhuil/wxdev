<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(20),
        'author'=>$faker->name(10),
        'seo_title' => $faker->text(20),
        'seo_keyword' => $faker->text(20),
        'seo_description' => $faker->text(30),
        'content' => $faker->realText(200),
    ];
});
