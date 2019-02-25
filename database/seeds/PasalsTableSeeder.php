<?php

use Illuminate\Database\Seeder;

class PasalsTableSeeder extends Seeder
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
				'name' => 'Amazon Deal Shop', 
				'email' => 'amazon@buy.com', 
				'password' => 'password', 
				'contact' => '986451235', 
				'is_active' => '1', 
				'verified_at' => NULL, 
				'remember_token' => '', 
				'created_at' => '2019-01-23 17:57:19', 
				'updated_at' => '2019-01-23 17:57:19', 
			], 
			1 => [
				'id' => '2', 
				'name' => 'Nepal Guitar Shop', 
				'email' => 'ngs@nepal.com', 
				'password' => 'password', 
				'contact' => '986451235', 
				'is_active' => '1', 
				'verified_at' => NULL, 
				'remember_token' => '', 
				'created_at' => '2019-02-03 09:01:08', 
				'updated_at' => '2019-02-03 09:01:08', 
			], 
			2 => [
				'id' => '3', 
				'name' => 'Laley cosmetics', 
				'email' => 'laleypaley@gmail.com', 
				'password' => '12345678', 
				'contact' => '9854546446', 
				'is_active' => '1', 
				'verified_at' => NULL, 
				'remember_token' => '', 
				'created_at' => '2019-02-03 12:23:22', 
				'updated_at' => '2019-02-03 12:23:22', 
			], 
			3 => [
				'id' => '4', 
				'name' => 'rounsh wears', 
				'email' => 'rounsuh@gmail.com', 
				'password' => '12345678', 
				'contact' => '98181818181', 
				'is_active' => '1', 
				'verified_at' => NULL, 
				'remember_token' => '', 
				'created_at' => '2019-02-03 12:30:46', 
				'updated_at' => '2019-02-03 12:30:46', 
			], 
		];
		\Schema::disableForeignKeyConstraints();
        \DB::table("pasals")->delete();
        \Schema::enableForeignKeyConstraints();
        \DB::table("pasals")->insert($users);
    }
}
