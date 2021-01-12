<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'POS Admin',
            'email' => 'admin@pos.com',
            'password' => bcrypt('adminsaja'),
            'status' => true
        ]);
    }
}
