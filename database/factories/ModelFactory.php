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
$factory->define(DestinyH\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_login' => $faker->unique()->userName,
        'password' => bcrypt($faker->password(7, 16)),
        'user_nicename' => $faker->name,
        'user_avatar' => $faker->imageUrl(120, 120),
        'user_email' => $faker->safeEmail,
        'user_confirmed' => '1',
        'user_rol' => 'member',
        'user_country' => $faker->country,
        'user_gender' => 'Masculino',
        'user_birth' => $faker->date('Y-m-d', 'now'),
        'user_about' => $faker->paragraph(9),
        'user_think' => $faker->sentence(9),
        'user_pub' => '1',
    ];
});

/**
 *  Factory for games
 */
$factory->define(DestinyH\Game::class, function (Faker\Generator $faker) {

    return [
        'game_name' => $faker->sentence(2),
        'game_description' => $faker->sentences(2, true),
        'game_developer' => $faker->name,
        'game_release' => $faker->date() .' ' . $faker->time(),
        'game_img' => $faker->imageUrl(1920, 960),
        'game_big_description' => $faker->paragraphs(10, true),
        'game_link' => 'http://www.nickaguilarh.com',
        'game_trailer' => 'https://www.youtube.com/watch?v=9sxoIJg65pE',
        'game_karma' => $faker->randomDigitNotNull,
        'user_id' => DestinyH\User::all()->random()->id,
    ];
});

/**
 * Factory for Posts
 */

$factory->define(DestinyH\Post::class, function (Faker\Generator $faker) {

    return [
        'post_title' => $faker->sentence(6),
        'post_content' => $faker->paragraphs(5, true),
        'post_tag' => $faker->word,
        'post_karma' => $faker->randomDigitNotNull,
        'post_img' => $faker->imageUrl(700, 460),
        'user_id' => DestinyH\User::all()->random()->id,
        'game_id' => DestinyH\Game::all()->random()->id,
    ];
});

/**
 * Factory for comments
 */

$factory->define(DestinyH\Comment::class, function (Faker\Generator $faker) {

    return [
        'comment_content' => $faker->paragraph(4),
        'comment_karma' => $faker->randomDigitNotNull,
        'user_id' => DestinyH\User::all()->random()->id,
        'post_id' => DestinyH\Post::all()->random()->id,
    ];
});
