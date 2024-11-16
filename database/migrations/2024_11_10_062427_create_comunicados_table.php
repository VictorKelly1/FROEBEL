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
        Schema::create('Comunicados', function (Blueprint $table) {
            $table->id('idComunicado');
            $table->string('Titulo');
            $table->dateTime('Fecha'); // Fecha completa con hora
            $table->text('Destinatarios'); // Lista de destinatarios (puede ser un texto JSON o separado por comas)
            $table->string('Medio'); // Medio de comunicación (ejemplo: correo, físico, etc.)
            $table->text('Adjuntos')->nullable(); // Almacena rutas de archivos adjuntos (puede ser un texto JSON o separado por comas)
            $table->unsignedBigInteger('idEmisor'); // Relación con la tabla Personas para el emisor
            $table->timestamps();

            // Llave foránea a la tabla Personas para el emisor
            $table->foreign('idEmisor')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Comunicados');
    }
};
