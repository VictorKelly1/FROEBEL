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
        Schema::create('MaterialesIntendentes', function (Blueprint $table) {
            $table->id('idMaterialIntendente');
            $table->unsignedBigInteger('idIntendente'); // Relación con la tabla Intendentes
            $table->unsignedBigInteger('idMaterial'); // Relación con la tabla Materiales
            $table->dateTime('Fecha'); // Fecha asignación del material
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idIntendente')->references('idIntendente')->on('Intendentes');
            $table->foreign('idMaterial')->references('idMaterial')->on('Materiales');

            //Llave unica
            $table->unique(['idIntendente', 'idMaterial']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('MaterialesIntendentes');
    }
};
