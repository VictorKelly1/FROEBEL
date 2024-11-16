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
        Schema::create('Materiales', function (Blueprint $table) {
            $table->id('idMaterial');
            $table->String('NombreMaterial');
            $table->string('UnidadMedida');
            $table->integer('Cantidad');
            $table->decimal('Costo', 8, 2); // Usa decimal para valores monetarios
            $table->timestamps();

            $table->unique(['UnidadMedida', 'Cantidad', 'Costo']); // Llave única para evitar duplicados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Materials');
    }
};
