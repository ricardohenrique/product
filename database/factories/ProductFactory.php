<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'DESCRICAO' => $faker->text(500),
        'COD_CATEGORIA' => factory(App\Models\Category::class)->create(),
    ];
});
