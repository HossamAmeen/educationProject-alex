<?php

use Illuminate\Database\Seeder;
// use Carbon ;
use Carbon\Carbon;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            UserSeed::class,
        ]);

        \App\Models\Teacher::create([
            'full_name' => "hossam teacher",
             'email'=> "hossam_teacher@gmail.com",
              'user_name' => "hossam",
              'password' => bcrypt('admin'),
              'phone' => "01010079798"
        ]);
        \App\Models\Teacher::create([
            'full_name' => "hossam teacher",
             'email'=> "hossam_teacher2@gmail.com",
              'user_name' => "hossam2",
              'password' => bcrypt('admin'),
              'phone' => "01010079798"
        ]);
        \App\Models\Student::create([
            'full_name' => "hossam student",
             'email'=> "hossam_student@gmail.com",
              'user_name' => "hossam_student",
              'password' => bcrypt('admin'),
              'phone' => "01010079798",
              'parent_phone'=>"01010079792",
              'level'=>"secondary"
        ]);

        \App\Models\Room::create([
            'name' => "math with hossam",
            'subject'=> "math",
            'teacher_id'=>1,
            'is_private'=> "0",
            'approvement'=>'accept',
            'user_id' => 1
        ]);

        \App\Models\Room::create([
            'name' => "Science with hossam",
            'subject'=> "Science",
            'teacher_id'=>1,
            'approvement'=>'accept',
            'user_id' => 1
        ]);
        \App\Models\RoomTeacher::create([
            'room_id'=> "1",
            'teacher_id'=>1,
            'is_private'=> "0",
            'user_id' => 1
        ]);
        
        \App\Models\RoomTeacher::create([
            'room_id'=> "1",
            'teacher_id'=>1,
            'user_id' => 1
        ]);

        // \App\Models\PrivateRoom::create([
        //     'name' => "Science with hossam",
        //     'subject'=> "Science",
        //     'teacher_id'=>1,
        //     'user_id' => 1
        // ]);

        \App\Models\FileRoom::create([
            'name' => "Science with hossam",
            'path'=> "test path",
            'room_id'=>1,
        ]);

        // \App\Models\FilePrivateRoom::create([
        //     'name' => "Science with hossam private rrom ",
        //     'path'=> "test path",
        //     'room_id'=>1,
        // ]);
        $faker = Faker::create();
        $starts_at = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp()) ;

        $ends_at= Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)->addHours( $faker->numberBetween( 1, 8 ) );
       
        \App\Models\RoomLive::create([
            'name' => "live Science with hossam",
            'youtube_video_path'=> "test path",
            'appointment' => $ends_at,
            'description'=>"science with hossam",
            'room_id'=>1,
        ]);
        // \App\Models\PrivateRoomLive::create([
        //     'name' => "live Science with hossam private room",
        //     'youtube_video_path'=> "test path",
        //     'appointment' => "thunday 20:30",
        //     'description'=>"science with hossam  private room",
        //     'room_id'=>1,
          
        // ]);

        // factory('App\Models\User',25)->create();
        factory('App\Models\Teacher',25)->create();
        factory('App\Models\Student',25)->create();
        factory('App\Models\Room',25)->create();
        factory('App\Models\RoomTeacher',25)->create();
        factory('App\Models\StudentRoom',25)->create();
        factory('App\Models\RoomLive',10)->create();
        factory('App\Models\LiveComment',50)->create();
        factory('App\Models\LiveConnect',50)->create();
        // factory('App\Models\PrivateRoom',25)->create();



       
       

    }
}
