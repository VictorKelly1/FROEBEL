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
        Schema::create('Horarios', function (Blueprint $table) {
            $table->id('idHorario');
            $table->unsignedBigInteger('idAula'); // Relación con la tabla Aulas
            $table->unsignedBigInteger('idGrupoMateria'); // Relación con la tabla GruposMaterias
            $table->string('HoraL')->nullable(); // Hora para el lunes
            $table->string('HoraM')->nullable();
            $table->string('HoraMi')->nullable();
            $table->string('HoraJ')->nullable();
            $table->string('HoraV')->nullable();
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idAula')->references('idAula')->on('Aulas');
            $table->foreign('idGrupoMateria')->references('idGrupoMateria')->on('GruposMaterias');

            // Llave única
            $table->unique(['idAula', 'idGrupoMateria', 'HoraL', 'HoraM', 'HoraMi', 'HoraJ', 'HoraV']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Horarios');
    }
};
