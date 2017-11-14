<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(CostCategorySeeder::class);
        $this->call(TransportsSeeder::class);
        $this->call(CostsSeeder::class);
    }

}
