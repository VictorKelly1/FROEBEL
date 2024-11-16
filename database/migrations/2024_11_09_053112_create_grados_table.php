<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Grados', function (Blueprint $table) {
            $table->id('idGrado');
            $table->string('NombreGrado');
            $table->string('NivelAcademico');
            $table->timestamps();

            $table->unique(['NombreGrado', 'NivelAcademico']); // Llave única 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Grados');
    }
};
