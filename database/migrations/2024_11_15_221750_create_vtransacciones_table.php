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
            CREATE VIEW vTransacciones AS
            SELECT 
                t.idTransaccion,
                p.idPersona AS idPersona,
                p.Nombre,
                p.ApellidoPaterno,
                p.ApellidoMaterno,
                pe.idPeriodo,
                pe.Clave,
                pe.FechaInicio,
                pe.FechaFin,
                pe.Tipo AS TipoPeriodo,
                t.Cantidad,
                t.Tipo AS TipoTransaccion,
                c.idConcepto,
                c.Nombre AS NombreConcepto,
                t.MetodoPago,
                t.Monto,
                t.CuentaRecibido
            FROM 
                Transacciones t
            INNER JOIN 
                Personas p ON t.idPersona = p.idPersona
            INNER JOIN 
                Periodos pe ON t.idPeriodo = pe.idPeriodo
            INNER JOIN 
                Conceptos c ON t.idConcepto = c.idConcepto
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vTransacciones');
    }
};
