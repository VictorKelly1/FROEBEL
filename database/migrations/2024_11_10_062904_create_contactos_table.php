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
        Schema::create('Contactos', function (Blueprint $table) {
            $table->id('idContacto');
            $table->string('TipoContacto'); // Tipo de contacto (ejemplo: teléfono, correo electrónico, etc.)
            $table->string('ValorContacto'); // Valor del contacto (ejemplo: número de teléfono, dirección de correo)
            $table->unsignedBigInteger('idReceptor'); // Relación con la tabla Personas para el receptor
            $table->timestamps();

            // Clave foránea a la tabla Personas para el receptor
            $table->foreign('idReceptor')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Contactos');
    }
};
