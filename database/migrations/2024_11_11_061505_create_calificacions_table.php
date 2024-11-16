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
        Schema::create('Calificaciones', function (Blueprint $table) {
            $table->id('idCalificacion');
            $table->unsignedBigInteger('idAlumno'); // Relación con la tabla Alumnos
            $table->unsignedBigInteger('idGruposMaterias'); // Relación con la tabla GruposMaterias
            $table->integer('parcial1')->nullable(); // Calificación para el parcial 
            $table->integer('parcial2')->nullable();
            $table->integer('parcial3')->nullable();
            $table->integer('parcial4')->nullable();
            $table->integer('parcial5')->nullable();
            $table->integer('parcial6')->nullable();
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idAlumno')->references('idAlumno')->on('Alumnos');
            $table->foreign('idGruposMaterias')->references('idGrupoMateria')->on('GruposMaterias');

            // Llave única 
            $table->unique(['idAlumno', 'idGruposMaterias']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Calificaciones');
    }
};
