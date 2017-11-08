<?php

use Illuminate\Database\Seeder;

class CostCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $categories = ['Motorina', 'Consumabile', 'Piese', 'Manopera', 'TAXE', 'Altele'];
        foreach ($categories as $category => $name) {
            \App\CostCategory::create(['name' => $name]);
        }
    }

}
