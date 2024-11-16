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
        Schema::create('DescTransacciones', function (Blueprint $table) {
            $table->id('idDescuentoTransaccion');
            $table->unsignedBigInteger('idTransaccion'); // Relación con la tabla Transacciones
            $table->unsignedBigInteger('idDescuento'); // Relación con la tabla Descuentos
            $table->timestamps();

            // Llave foráneas
            $table->foreign('idTransaccion')->references('idTransaccion')->on('Transacciones');
            $table->foreign('idDescuento')->references('idDescuento')->on('Descuentos');

            // Llave única 
            $table->unique(['idTransaccion', 'idDescuento']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('DescTransacciones');
    }
};
