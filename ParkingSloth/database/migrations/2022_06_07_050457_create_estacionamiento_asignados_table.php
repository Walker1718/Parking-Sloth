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
        Schema::create('estacionamiento_asignados', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Usuario');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('Usuario')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Estacionamiento');
            $table->foreign('ID_Estacionamiento')->references('ID_Estacionamiento')->on('estacionamientos')->onDelete('cascade');
            $table->date('Horario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamiento_asignados');
    }
};
