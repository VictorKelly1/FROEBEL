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
        Schema::create('Tutores', function (Blueprint $table) {
            $table->id('idTutor');
            $table->string('NoINE')->unique(); // Llave única para evitar duplicados
            $table->string('RFC')->unique(); // Llave única para evitar duplicados
            $table->string('LugarTrabajo');
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // Llave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Tutores');
    }
};
