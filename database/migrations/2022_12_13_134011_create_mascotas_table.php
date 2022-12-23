<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('codigo')->nullable();
            $table->integer('tipo_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->integer('raza_id')->unsigned();
            $table->string('color')->nullable();
            $table->date('f_nac')->nullable();
            $table->string('foto')->nullable();

            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('raza_id')->references('id')->on('razas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mascotas');
    }
}
