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
        Schema::create('GruposDocente', function (Blueprint $table) {
            $table->id('idGrupoDocente');
            $table->unsignedBigInteger('idDocente'); // Relación con la tabla Docentes
            $table->unsignedBigInteger('idGrupo'); // Relación con la tabla Grupos
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idDocente')->references('idDocente')->on('Docentes');
            $table->foreign('idGrupo')->references('idGrupo')->on('Grupos');

            // Llave única 
            $table->unique(['idGrupo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('GruposDocente');
    }
};
