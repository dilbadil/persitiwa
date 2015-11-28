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
    return [
        'username' => $faker->userName,
        'account' => 'twitter',
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
