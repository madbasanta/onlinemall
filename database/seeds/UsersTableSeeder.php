<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	'id' => 1,
        	'name' => 'Admin@onlinemall',
        	'email' => 'info@onlinemall.com',
        	'password' => bcrypt('password@123'),
        	'role_id' => 1,
        ];
        \DB::table('users')->delete();
        \DB::table('users')->insert($users);
    }
}
