<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'intro' => $faker->text(220),
        'img' => "http://placehold.it/900x300",
        'body'  => $faker->text(1500),
        'comments' => [
            // {
            //     'username' => 'user name test',
            //     'user_img' => 'http://placehold.it/50x50',
            //     'comment' => 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.'
            // }
        ]

    ];
});