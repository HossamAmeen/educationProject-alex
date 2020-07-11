<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=> 'admin',
            'email' => 'asd@asd.asd',
            'password' => bcrypt('admin'),
            'user_name' => "admin",
            'phone' => "01010079798",
            'user_id' => "1",
            'role' => 1,
        ]);
    }
}
