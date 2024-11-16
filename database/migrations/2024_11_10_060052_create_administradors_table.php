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
        Schema::create('Administradores', function (Blueprint $table) {
            $table->id('idAdministrador');
            $table->string('Estado');
            $table->string('RFC')->unique(); // Llave única para evitar duplicados
            $table->string('NoINE')->unique(); // Llave única para evitar duplicados
            $table->decimal('Sueldo', 8, 2); // Sueldo en formato decimal
            $table->unsignedBigInteger('idUsuario'); // Relación con la tabla users
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // Clave foránea a la tabla users
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');

            // Clave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Administradores');
    }
};
