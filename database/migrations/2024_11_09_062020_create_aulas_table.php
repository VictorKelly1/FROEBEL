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
        Schema::create('Aulas', function (Blueprint $table) {
            $table->id('idAula');
            $table->string('Nombre');
            $table->integer('Capacidad');
            $table->string('Edificio');
            $table->integer('Piso');
            $table->string('Tipo'); // Tipo de aula, como laboratorio, salón, etc.
            $table->timestamps();

            $table->unique(['Nombre', 'Edificio', 'Piso']); // Llave única 
        });
    }

    public function down()
    {
        Schema::dropIfExists('Aulas');
    }
};
