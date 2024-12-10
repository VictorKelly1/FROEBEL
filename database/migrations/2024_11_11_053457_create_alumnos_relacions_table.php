<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Relaciones
    public function up()
    {
        Schema::create('AlumnosRelaciones', function (Blueprint $table) {
            $table->id('idRelacion');
            $table->string('Tipo');
            $table->unsignedBigInteger('idAlumno'); // Relación con la tabla Alumnos
            $table->unsignedBigInteger('idTutor'); // Relación con la tabla Tutores
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('idAlumno')->references('idAlumno')->on('Alumnos');
            $table->foreign('idTutor')->references('idTutor')->on('Tutores');

            // Llave unica
            $table->unique(['idAlumno', 'idTutor']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('AlumnosRelaciones');
    }
};
