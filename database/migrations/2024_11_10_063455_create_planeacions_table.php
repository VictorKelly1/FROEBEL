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
        Schema::create('Planeaciones', function (Blueprint $table) {
            $table->id('idPlaneacion');
            $table->dateTime('Fecha'); // Fecha completa de la planeación
            $table->boolean('Cumplimiento'); // Indica si se cumple la planeación (true/false)
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas para el responsable
            $table->timestamps();

            // Llave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Planeaciones');
    }
};
