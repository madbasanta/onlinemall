<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
			0 => [
				'id' => '1', 
				'color' => 'blue', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:08:26', 
				'updated_at' => '2019-01-17 16:08:26', 
			], 
			1 => [
				'id' => '2', 
				'color' => 'red', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:08:26', 
				'updated_at' => '2019-01-17 16:08:26', 
			], 
			2 => [
				'id' => '3', 
				'color' => 'white', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:08:27', 
				'updated_at' => '2019-01-17 16:08:27', 
			], 
			3 => [
				'id' => '4', 
				'color' => 'brown', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:08:27', 
				'updated_at' => '2019-01-17 16:08:27', 
			], 
			4 => [
				'id' => '5', 
				'color' => 'purple', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:08:27', 
				'updated_at' => '2019-01-17 16:08:27', 
			], 
		];
        \DB::table("colors")->delete();
        \DB::table("colors")->insert($users);
    }
}
