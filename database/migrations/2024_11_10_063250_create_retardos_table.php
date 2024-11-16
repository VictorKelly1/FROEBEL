<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Retardos', function (Blueprint $table) {
            $table->id('idRetardo');
            $table->dateTime('Fecha'); // Fecha completa que incluye día, mes, año y hora del retardo
            $table->string('Motivo');
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // Llave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Retardos');
    }
};
