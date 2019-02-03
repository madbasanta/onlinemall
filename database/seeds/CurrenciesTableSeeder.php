<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
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
				'code' => 'Rs', 
				'title' => 'NRS', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:38:26', 
				'updated_at' => '2019-01-17 16:38:26', 
			], 
			1 => [
				'id' => '2', 
				'code' => 'IRs', 
				'title' => 'IRS', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:38:26', 
				'updated_at' => '2019-01-17 16:38:26', 
			], 
			2 => [
				'id' => '3', 
				'code' => '$', 
				'title' => 'USD', 
				'is_active' => '1', 
				'created_at' => '2019-01-17 16:38:27', 
				'updated_at' => '2019-01-17 16:38:27', 
			], 
		];
        \DB::table("currencies")->delete();
        \DB::table("currencies")->insert($users);
    }
}
