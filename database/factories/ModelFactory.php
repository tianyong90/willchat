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
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name'           => $faker->name,
//        'email'          => $faker->unique()->safeEmail,
//        'password'       => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->sentence(mt_rand(3, 8)),
        'content'      => implode("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(App\Reply::class, function (Faker\Generator $faker) {
    return [
        'account_id'       => 1,
        'trigger_type'     => 'keywords',
        'trigger_keywords' => $faker->word,
        'content'          => $faker->sentence,
    ];
});
