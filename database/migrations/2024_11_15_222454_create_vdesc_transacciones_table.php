<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vDescTransacciones AS
            SELECT 
                dt.idDescuentoTransaccion,
                t.idTransaccion,
                vt.idPersona,
                vt.Nombre,
                vt.ApellidoPaterno,
                vt.ApellidoMaterno,
                vt.idPeriodo,
                vt.Clave,
                vt.FechaInicio,
                vt.FechaFin,
                vt.TipoPeriodo,
                vt.Cantidad,
                vt.TipoTransaccion,
                vt.idConcepto,
                vt.NombreConcepto,
                vt.MetodoPago,
                vt.Monto,
                vt.CuentaRecibido,
                d.idDescuento,
                d.Nombre AS NombreDescuento,
                d.Tipo AS TipoDescuento,
                d.Monto AS MontoDescuento
            FROM 
                DescTransacciones dt
            INNER JOIN 
                Transacciones t ON dt.idTransaccion = t.idTransaccion
            INNER JOIN 
                vTransacciones vt ON vt.idTransaccion = t.idTransaccion
            INNER JOIN 
                Descuentos d ON dt.idDescuento = d.idDescuento
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vDescTransacciones');
    }
};
