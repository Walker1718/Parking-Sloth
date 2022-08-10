<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamientos', function (Blueprint $table) {
            $table->id('ID_Estacionamiento')->autoIncrement();
            $table->integer('ID_Lista')->references('ID_Lista')->on('lista_estacionamientos');
            $table->integer('Numero')->nullable();
            $table->boolean('Activo');
            $table->integer('Capacidad_Total');
            $table->integer('Capacidad_Utilizada');
            $table->string('Referencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamientos');
    }
};
