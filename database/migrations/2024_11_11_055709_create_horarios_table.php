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
            $table->unsignedBigInteger('idMateria'); // Relación con la tabla Materias
            $table->time('HoraL')->nullable(); // Hora para el lunes
            $table->time('HoraM')->nullable(); // Hora para el martes
            $table->time('HoraMi')->nullable(); // Hora para el miércoles
            $table->time('HoraJ')->nullable(); // Hora para el jueves
            $table->time('HoraV')->nullable(); // Hora para el viernes
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idAula')->references('idAula')->on('Aulas');
            $table->foreign('idMateria')->references('idMateria')->on('Materias');

            // Llave única
            $table->unique(['idAula', 'idMateria', 'HoraL', 'HoraM', 'HoraMi', 'HoraJ', 'HoraV']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Horarios');
    }
};
