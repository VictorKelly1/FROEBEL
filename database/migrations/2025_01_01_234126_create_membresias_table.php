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
        Schema::create('Membresias', function (Blueprint $table) {
            $table->id();
            $table->string('Recurrencia'); // Mensual, anual, trimestral...
            $table->decimal('Costo', 8, 2); // Costo de la membresía
            $table->string('NivelAcademico'); // Nivel de la membresía
            $table->timestamps();
            //

            $table->unique(['Recurrencia', 'NivelAcademico']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
