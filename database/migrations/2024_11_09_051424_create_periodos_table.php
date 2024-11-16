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
        Schema::create('Periodos', function (Blueprint $table) {
            $table->id('idPeriodo');
            $table->string('Clave')->unique();
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->string('Tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Periodos');
    }
};
