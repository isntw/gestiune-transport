<?php

use Illuminate\Database\Seeder;

class TransportsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Transport::class, 50)->create();
    }

}
