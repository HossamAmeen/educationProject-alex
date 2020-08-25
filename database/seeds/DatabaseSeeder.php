<?php

use Illuminate\Database\Seeder;

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

        \App\Models\Student::create([
            'full_name' => "hossam student",
             'email'=> "hossam_student@gmail.com",
              'user_name' => "hossam_student",
              'password' => bcrypt('admin'),
              'phone' => "01010079798",
              'level'=>"secondary"
        ]);

        \App\Models\Room::create([
            'name' => "math with hossam",
            'subject'=> "math",
            'teacher_id'=>1,
            'user_id' => 1
        ]);

        \App\Models\Room::create([
            'name' => "Science with hossam",
            'subject'=> "Science",
            'teacher_id'=>1,
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

       
        \App\Models\RoomLive::create([
            'name' => "live Science with hossam",
            'youtube_video_path'=> "test path",
            'appointment' => "thunday 20:30",
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
        
        // factory('App\Models\PrivateRoom',25)->create();



       
       

    }
}
