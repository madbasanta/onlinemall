<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
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
				'size' => '10', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:13:47', 
				'updated_at' => '2019-01-17 16:13:47', 
			], 
			1 => [
				'id' => '2', 
				'size' => '4', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:13:48', 
				'updated_at' => '2019-01-17 16:13:48', 
			], 
			2 => [
				'id' => '3', 
				'size' => '8', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:13:48', 
				'updated_at' => '2019-01-17 16:13:48', 
			], 
			3 => [
				'id' => '4', 
				'size' => '12', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:13:48', 
				'updated_at' => '2019-01-17 16:13:48', 
			], 
			4 => [
				'id' => '5', 
				'size' => '16', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:13:48', 
				'updated_at' => '2019-01-17 16:13:48', 
			], 
		];
        \DB::table("sizes")->delete();
        \DB::table("sizes")->insert($users);
    }
}
