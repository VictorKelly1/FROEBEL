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
        Schema::create('GruposAlumnos', function (Blueprint $table) {
            $table->id('idGrupoAlumno');
            $table->unsignedBigInteger('idAlumno'); // Relación con la tabla Alumnos
            $table->unsignedBigInteger('idGrupo'); // Relación con la tabla Grupos
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idAlumno')->references('idAlumno')->on('Alumnos');
            $table->foreign('idGrupo')->references('idGrupo')->on('Grupos');

            // Llave única
            $table->unique(['idAlumno', 'idGrupo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('GruposAlumnos');
    }
};
