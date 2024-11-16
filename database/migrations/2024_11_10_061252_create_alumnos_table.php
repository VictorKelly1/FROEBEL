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
        Schema::create('Alumnos', function (Blueprint $table) {
            $table->id('idAlumno');
            $table->string('Matricula')->unique(); // Llave única para evitar duplicados
            $table->string('Estado');
            $table->date('FechaIngreso');
            $table->string('EscuelaProcede');
            $table->unsignedBigInteger('idUsuario'); // Relación con la tabla users de Laravel
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // Llave foránea a la tabla users
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            // Llave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Alumnos');
    }
};
