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
//          Data  Ruta	Dis.km	km/Cr	km	T/Cr	Kg/Cr	Lei	Firma
            $table->increments('id');
            $table->string('adresa_plecare');
            $table->string('adresa_destinatie');
            $table->timestamp('data_plecare');
            $table->timestamp('data_destinatie')->nullable();
            $table->string('firma');
            $table->double('km');
            $table->double('incasare');
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
