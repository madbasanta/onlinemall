<?php

		use Illuminate\Database\Seeder;

		class SettingsTableSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * @return void
		     */
		    public function run()
		    {
		        $data = [
					0 => [
						'id' => '1', 
						'code' => 'contact', 
						'value' => '9860000000', 
						'created_at' => '2019-02-11 09:52:15', 
						'updated_at' => '2019-02-11 09:52:15', 
					], 
					1 => [
						'id' => '2', 
						'code' => 'site-name', 
						'value' => 'Online Mall', 
						'created_at' => '2019-02-11 10:10:35', 
						'updated_at' => '2019-02-11 10:10:35', 
					], 
					2 => [
						'id' => '3', 
						'code' => 'delivery-location', 
						'value' => 'Bagmati, Kathmandu, Ringroad', 
						'created_at' => '2019-02-25 16:26:41', 
						'updated_at' => '2019-02-25 16:26:41', 
					], 
					3 => [
						'id' => '4', 
						'code' => 'delivery-options', 
						'value' => 'Home Delivery, truck', 
						'created_at' => '2019-02-25 16:29:05', 
						'updated_at' => '2019-02-25 16:29:05', 
					], 
					4 => [
						'id' => '5', 
						'code' => 'delivery-options', 
						'value' => 'Cash On Delivery, money-bill-alt', 
						'created_at' => '2019-02-25 16:35:23', 
						'updated_at' => '2019-02-25 16:35:23', 
					], 
					5 => [
						'id' => '6', 
						'code' => 'warrenty-options', 
						'value' => '7 Days Return, undo', 
						'created_at' => '2019-02-25 16:37:23', 
						'updated_at' => '2019-02-25 16:37:23', 
					], 
				];
		        \DB::table("settings")->delete();
		        \DB::table("settings")->insert($data);
		    }
		}
		