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
        Schema::create('Transacciones', function (Blueprint $table) {
            $table->id('idTransaccion');
            $table->integer('Cantidad');
            $table->string('Tipo');
            $table->string('MetodoPago'); // Ejemplo: 'Efectivo', 'Tarjeta', 'Transferencia'
            $table->decimal('Monto', 10, 2);
            $table->string('CuentaRecibido'); // Cuenta donde se recibió el pago si se recibio en cuenta
            $table->unsignedBigInteger('idConcepto'); // Relación con la tabla Conceptos
            $table->unsignedBigInteger('idPeriodo'); // Relación con la tabla Periodos
            $table->unsignedBigInteger('idPersona'); // Relación con la tabla Personas
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idConcepto')->references('idConcepto')->on('Conceptos');
            $table->foreign('idPeriodo')->references('idPeriodo')->on('Periodos');
            $table->foreign('idPersona')->references('idPersona')->on('Personas');

            // Llave única para evitar duplicados en la combinación de concepto, periodo y persona
            $table->unique(['idConcepto', 'idPeriodo', 'idPersona']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Transacciones');
    }
};
