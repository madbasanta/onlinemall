<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $roles = [
        	[
	        	'id' => 1,
	        	'name' => 'admin',
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        	[
	        	'id' => 2,
	        	'name' => 'seller',
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        	[
	        	'id' => 3,
	        	'name' => 'buyer',
	        	'created_at' => now(),
	        	'updated_at' => now(),
	        ],
        ];

        \DB::table('roles')->insert($roles);
    }
}
