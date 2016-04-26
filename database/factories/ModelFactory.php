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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $rand1 = rand(0, 1);
    $rand2 = rand(0, 2);
    switch ($rand2) {
        case 0 :
            $l = 'm';
            break;
        case 1 :
            $l = 'f';
            break;
        case 2 :
            $l = 'b';
            break;
    }
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'city_id' => rand(1, 2),
        'sex' => ($rand1 ? 'm' : 'f'),
        'looking_for' => $l,
        'admin' => false,
        'picture' => 'dummy.jpg'
    ];
});

$factory->define(App\City::class, function(\Faker\Generator $faker){
    $address = new Faker\Provider\en_GB\Address($faker);
    return [
       'name' => $address->city(),
       'location' => $address->latitude().','.$address->longitude(),
       'description' => $faker->text(200)
    ];
});
