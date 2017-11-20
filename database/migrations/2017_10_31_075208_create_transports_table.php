<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firma');
            $table->string('adresa_plecare');
            $table->string('adresa_destinatie');
            $table->double('km');
            $table->double('dislocare_km');
            $table->timestamp('data_plecare');
            $table->double('timp');
            $table->double('kg');
            $table->double('suma');
            $table->boolean('is_payed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transports');
    }

}
