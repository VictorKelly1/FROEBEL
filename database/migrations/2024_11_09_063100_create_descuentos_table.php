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
        Schema::create('Descuentos', function (Blueprint $table) {
            $table->id('idDescuento');
            $table->string('Nombre');
            $table->string('Para');
            $table->string('Tipo'); // Tipo de descuento, por ejemplo, porcentaje o cantidad fija
            $table->decimal('Monto', 8, 2); // Usamos decimal para valores monetarios
            $table->timestamps();

            $table->unique(['Nombre', 'Tipo']); // Llave única para evitar duplicados de tipo de descuento con el mismo nombre
        });
    }

    public function down()
    {
        Schema::dropIfExists('Descuentos');
    }
};
