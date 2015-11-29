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

$factory->define(App\User::class, function ($faker) {
    $images = [
        "https://pbs.twimg.com/profile_images/653570941402787840/MYmUlSkS.jpg",
        "https://pbs.twimg.com/profile_images/661457133695692800/B-CgYlA8.jpg",
        "https://pbs.twimg.com/profile_images/667129260612546560/2FAjXDyX.jpg",
        "https://pbs.twimg.com/profile_images/658527492639092736/TEliY1D3.jpg"
    ];
    return [
        'username' => $faker->userName,
        'account' => 'twitter',
        'profile_image_url' => $images[array_rand($images)]
    ];

});

$factory->define(App\Tag::class, function ($faker) {
    $label = $faker->sentence(2);
    $name = str_replace(" ", "_", $label);
    $name = strtolower($name);

    return [
        'name' => $name,
        'label' => $label,
    ];
});

$factory->define(App\Status::class, function ($faker) {
    $userIds = App\User::all()->lists('id')->toArray();
    $provinsiIds = App\Provinsi::all()->lists('id')->toArray();

    return [
        'status_id' => $faker->ean8,
        'body' => $faker->text(80),
        'user_id' => array_rand($userIds),
        'lokasi_peristiwa' => array_rand($provinsiIds),
        'lokasi_status' => $faker->longitude
    ];
});
