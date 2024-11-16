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
        Schema::create('MaterialesDocentes', function (Blueprint $table) {
            $table->id('idMaterialDocente');
            $table->unsignedBigInteger('idDocente'); // Relación con la tabla Docentes
            $table->unsignedBigInteger('idMaterial'); // Relación con la tabla Materiales
            $table->dateTime('Fecha'); // Fecha asignación del material
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idDocente')->references('idDocente')->on('Docentes');
            $table->foreign('idMaterial')->references('idMaterial')->on('Materiales');

            // Llave unica
            $table->unique(['idDocente', 'idMaterial']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('MaterialesDocentes');
    }
};
