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
        factory('App\Models\User',25)->create();
        \App\Models\Teacher::create([
            'full_name' => "hossam",
             'email'=> "hossam@gmail.com",
              'user_name' => "hossam",
              'password' => bcrypt('admin'),
              'phone' => "010"
        ]);
       
        \App\Models\Teacher::create([
            'full_name' => "hossam2",
             'email'=> "hossam2@gmail.com",
              'user_name' => "hossam2",
              'password' => bcrypt('admin'),
              'phone' => "012"
        ]);

    }
}
