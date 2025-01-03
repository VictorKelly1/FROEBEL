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
            CREATE VIEW vGruposMaterias AS
            SELECT 
                gm.IdGrupoMateria,
                gm.idMateria,
                m.NombreMateria,
                m.Clave,
                m.Tipo AS TipoMateria,
                gm.idGrupo,
                g.ClavePeriodo,
                g.TipoPeriodo,
                g.NombreGrado,
                g.Paquete,
                g.NivelAcademico
            FROM 
                GruposMaterias gm
            INNER JOIN 
                Materias m ON gm.idMateria = m.idMateria
            INNER JOIN 
                vGrupos g ON gm.idGrupo = g.idGrupo
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vGruposMaterias');
    }
};
