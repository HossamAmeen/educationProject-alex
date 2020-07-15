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
        
        factory('App\Models\User',25)->create();
        factory('App\Models\Teacher',25)->create();
        factory('App\Models\Student',25)->create();
        factory('App\Models\Room',25)->create();




       
       

    }
}
