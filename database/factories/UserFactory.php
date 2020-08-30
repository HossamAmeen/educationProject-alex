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
        'full_name' =>$faker->name,
        'email'=> $faker->email,
         'user_name' => "hossam_student",
         'password' => bcrypt('admin'),
         'phone' => "01010079798",
         'is_private'=>rand(0,1),
         'user_id' => 1
    ];
});


$factory->define(App\Models\Student::class, function (Faker $faker) {

    return [
        'full_name' =>$faker->name,
        'email'=> $faker->email,
         'user_name' => "student".rand(1,50),
         'password' => bcrypt('admin'),
         'phone'=>"010".rand(1,9).rand(1,9).rand(1,9).rand(1,9) .rand(1,9) .rand(1,9) .rand(1,9) .rand(1,9),
         'parent_phone'=>"010".rand(1,9).rand(1,9).rand(1,9).rand(1,9) .rand(1,9) .rand(1,9) .rand(1,9) .rand(1,9),
         'level'=>"secondary",
         'user_id' => 1
    ];
});

$factory->define(App\Models\Room::class, function (Faker $faker) {

    return [
        'name' => "room".rand(1,15),
        'subject'=> "math",
        // 'teacher_id'=>rand(1,15),
        'is_private'=>rand(0,1),
         'user_id' => 1
    ];
});

// $factory->define(App\Models\PrivateRoom::class, function (Faker $faker) {

//     return [
//         'name' => "room".rand(1,15),
//         'subject'=> "math",
//         'teacher_id'=>rand(1,15),
//          'user_id' => 1
//     ];
// });

$factory->define(App\Models\RoomTeacher::class, function (Faker $faker) {

    return [
        'room_id'=>rand(1,15),
        'teacher_id'=>rand(1,10),
        'is_private'=>rand(0,1),
        'user_id' => 1
    ];
});

$factory->define(App\Models\StudentRoom::class, function (Faker $faker) {

    return [
        'room_id'=>rand(1,15),
        'student_id'=>rand(1,25),
       
        'user_id' => 1
    ];
});
$factory->define(App\Models\RoomLive::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'youtube_video_path'=> "test path",
        'appointment' => $faker->dateTimeBetween(),
        'description'=>"science with hossam",
        'room_id'=>rand(1,15),
    ];
});

$factory->define(App\Models\LiveComment::class, function (Faker $faker) {

    return [
        'comment'=>$faker->text ,
        'user_name'=>$faker->name ,
        'live_id'=>rand(1,8) 
    ];
});
$factory->define(App\Models\LiveConnect::class, function (Faker $faker) {

    return [
        
        'student_id'=>rand(1,8) ,
        'live_id'=>rand(1,8) 
    ];
});
