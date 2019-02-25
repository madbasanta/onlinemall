<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PageComponentsTableSeeder::class);
        // $this->call(BrandsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(ColorsTableSeeder::class);
        // $this->call(CurrenciesTableSeeder::class);
        // $this->call(SizesTableSeeder::class);
        // $this->call(PasalsTableSeeder::class);
    }
}
