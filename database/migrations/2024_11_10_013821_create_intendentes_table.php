<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Entidad Dependiente
    public function up()
    {
        Schema::create('Intendentes', function (Blueprint $table) {
            $table->id('idIntendente');
            $table->string('Estado');
            $table->string('RFC')->unique(); // Llave única para evitar duplicados
            $table->string('NoINE')->unique(); // Llave única para evitar duplicados
            $table->decimal('Sueldo', 8, 2);
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // llave foránea a la tabla Personas
            $table->foreign('idPersona')->references('idPersona')->on('Personas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Intendentes');
    }
};
