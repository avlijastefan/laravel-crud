<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => '1234567890',
            'access' => 2
        ]);

        User::create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '012345678',
            'access' => 3
        ]);
    }
}
