<?php

use GeneaLabs\LaravelWeblog\Post;
use Faker\Generator;

$factory->define(Post::class, function (Generator $faker) {
    $title = rtrim($faker->sentence(rand(2, 10)), '.');

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'exerpt' => $faker->paragraph(5),
        'content' => $faker->paragraphs(4),
        'featured_media' => $faker->image(1600, 900, 'cute'),
        'category' => ucwords($faker->word()),
    ];
});
