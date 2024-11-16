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
        Schema::create('Fijos', function (Blueprint $table) {
            $table->id('idFijo');
            $table->string('NombreArticulo');
            $table->string('Categoria');
            $table->integer('Cantidad');
            $table->timestamps();

            $table->unique(['NombreArticulo', 'Categoria']); // Llave única 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Fijos');
    }
};
