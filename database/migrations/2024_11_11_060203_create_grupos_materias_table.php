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
        Schema::create('GruposMaterias', function (Blueprint $table) {
            $table->id('idGrupoMateria');
            $table->unsignedBigInteger('idGrupo'); // Relación con la tabla Grupos
            $table->unsignedBigInteger('idMateria'); // Relación con la tabla Materias
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idGrupo')->references('idGrupo')->on('Grupos');
            $table->foreign('idMateria')->references('idMateria')->on('Materias');

            // Llave única 
            $table->unique(['idGrupo', 'idMateria']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('GruposMaterias');
    }
};
