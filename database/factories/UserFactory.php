<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    return [
     

        'user_name' => $faker->name.'_user',
        'name' => $faker->name , 
        'password' => bcrypt('admin'),
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'role' => 2,
        'user_id' => 1
    ];
});


$factory->define(App\Models\Teacher::class, function (Faker $faker) {

    return [
        'full_name' => "hossam teacher",
        'email'=> "hossam_student@gmail.com",
         'user_name' => "hossam_student",
         'password' => bcrypt('admin'),
         'phone' => "01010079798",
         'user_id' => 1
    ];
});


$factory->define(App\Models\Student::class, function (Faker $faker) {

    return [
        'full_name' => "hossam student",
        'email'=> "hossam_student@gmail.com",
         'user_name' => "hossam_student",
         'password' => bcrypt('admin'),
         'phone' => "01010079798",
         'level'=>"secondary",
         'user_id' => 1
    ];
});

$factory->define(App\Models\Room::class, function (Faker $faker) {

    return [
        'name' => "room".rand(1,15),
        'subject'=> "math",
        'teacher_id'=>rand(1,15),
         'user_id' => 1
    ];
});

$factory->define(App\Models\PrivateRoom::class, function (Faker $faker) {

    return [
        'name' => "room".rand(1,15),
        'subject'=> "math",
        'teacher_id'=>rand(1,15),
         'user_id' => 1
    ];
});

