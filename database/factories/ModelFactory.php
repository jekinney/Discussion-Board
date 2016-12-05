<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Users\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Boards\Models\Board::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
    ];
});

$factory->define(App\Boards\Models\Topic::class, function (Faker\Generator $faker) {
    $body = '';
    foreach($faker->paragraphs(3) as $para) {
        $body .= '<p>'.$para.'</p>';
    }
    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'body' => $body,
    ];
});

$factory->define(App\Boards\Models\Reply::class, function (Faker\Generator $faker) {
    $body = '';
    foreach($faker->paragraphs(3) as $para) {
        $body .= '<p>'.$para.'</p>';
    }
    return [
        'user_id' => 1,
        'body' => $body,
    ];
});
