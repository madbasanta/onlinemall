<?php

use Illuminate\Database\Seeder;

class PageComponentsTableSeeder extends Seeder
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
				'name' => 'banner', 
				'data' => '["public/banner/banner1.jpg","public/banner/banner2.jpg","public/banner/banner4.jpg"]', 
				'created_at' => '2019-01-11 00:00:00', 
				'updated_at' => '2019-01-12 11:33:15', 
			], 
			1 => [
				'id' => '2', 
				'name' => 'pasals', 
				'data' => '{"1":1}', 
				'created_at' => '2019-01-12 00:00:00', 
				'updated_at' => '2019-01-12 17:48:22', 
			], 
		];
        \DB::table("page_components")->delete();
        \DB::table("page_components")->insert($users);
    }
}
