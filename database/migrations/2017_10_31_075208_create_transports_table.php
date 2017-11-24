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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cui');
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('firma_id')->unsigned()->nullable();
            $table->string('adresa_plecare');
            $table->string('adresa_destinatie');
            $table->double('km');
            $table->double('dislocare_km');
            $table->dateTime('data_plecare');
            $table->double('timp');
            $table->double('kg');
            $table->double('suma');
            $table->boolean('is_payed')->default(false);
            $table->timestamps();

            $table->foreign('firma_id')
                    ->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');

        Schema::dropIfExists('transports');
    }

}
