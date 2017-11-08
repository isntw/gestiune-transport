<?php

use Illuminate\Database\Seeder;

class CostsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Cost::class, 50)->create();
    }

}
