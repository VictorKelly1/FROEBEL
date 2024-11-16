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
        Schema::create('Materias', function (Blueprint $table) {
            $table->id('idMateria');
            $table->string('Clave')->unique(); // Clave única para identificar cada materia
            $table->string('NombreMateria');
            $table->string('Tipo'); // Tipo de materia, por ejemplo, Regular, extraescolar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Materias');
    }
};
