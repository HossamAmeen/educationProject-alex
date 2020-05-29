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
        \App\Models\Teacher::create([
            'full_name' => "hossam",
             'emaill'=> "hossam@gmail.com",
              'user_name' => "hossam",
              'password' => bcrypt('admin'),
              'phone' => "010"
        ]);

        \App\Models\Teacher::create([
            'full_name' => "hossam2",
             'emaill'=> "hossam2@gmail.com",
              'user_name' => "hossam2",
              'password' => bcrypt('admin'),
              'phone' => "012"
        ]);

    }
}
