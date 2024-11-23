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
            CREATE VIEW vGrupos AS
            SELECT 
                g.idGrupo,
                p.idPeriodo,
                p.Clave AS ClavePeriodo,
                p.FechaInicio,
                p.FechaFin,
                p.Tipo AS TipoPeriodo,
                gr.idGrado,
                gr.NombreGrado AS NombreGrado,
                gr.NivelAcademico,
                g.Paquete,
                g.CantidadAlum AS cantidadAlumnos
            FROM 
                Grupos g
            INNER JOIN 
                Periodos p ON g.idPeriodo = p.idPeriodo
            INNER JOIN 
                Grados gr ON g.idGrado = gr.idGrado
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vGrupos');
    }
};
