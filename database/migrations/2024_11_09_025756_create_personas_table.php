<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Entidad Independiente
    public function up(): void
    {
        Schema::create('Personas', function (Blueprint $table) {
            $table->id('idPersona');
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno')->nullable();
            $table->string('CURP', 18)->unique();
            $table->date('FechaNacimiento');
            $table->enum('Genero', ['M', 'F', 'X']); // O cualquier otro formato que necesites
            $table->string('Ciudad');
            $table->string('Municipio');
            $table->string('CodigoPostal', 5);
            $table->string('ColFrac');
            $table->string('Calle');
            $table->string('NumeroExterior');
            $table->string('EstadoCivil');
            $table->string('Nacionalidad');
            $table->string('Foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Personas');
    }
};
