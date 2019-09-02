<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    $title = $faker->text(50);
    return [
        'title' => $title,
        'intro' => $faker->text(220),
        'slug' => str_slug($title, '-'),
        'img' => "900x300.png",
        'categories_id' => "",
        'body'  => $faker->text(1500),
        'tags'  => [],
        'comments' => [
            // {
            //     'username' => 'user name test',
            //     'user_img' => 'http://placehold.it/50x50',
            //     'comment' => 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.'
            // }
        ]

    ];
});