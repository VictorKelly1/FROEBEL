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
        Schema::create('Grupos', function (Blueprint $table) {
            $table->id('idGrupo');
            $table->integer('CantidadAlum'); // Cantidad de alumnos en el grupo
            $table->string('Paquete'); // paquete del grupo ejemplo: a, b, c, d,
            $table->unsignedBigInteger('idGrado'); // Relación con la tabla Grados
            $table->unsignedBigInteger('idPeriodo'); // Relación con la tabla Periodos
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idGrado')->references('idGrado')->on('Grados');
            $table->foreign('idPeriodo')->references('idPeriodo')->on('Periodos');

            // Llave unica
            $table->unique(['idGrado', 'idPeriodo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Grupos');
    }
};
