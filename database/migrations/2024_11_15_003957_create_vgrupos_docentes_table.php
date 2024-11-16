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
            CREATE VIEW vGruposDocentes AS
            SELECT 
                gd.idGrupoDocente,
                gd.idDocente,
                d.Nombre AS NombreDocente,
                d.ApellidoPaterno AS ApellidoPaternoDocente,
                d.ApellidoMaterno AS ApellidoMaternoDocente,
                gd.idGrupo,
                g.NombreGrado,
                g.NivelAcademico
            FROM 
                GruposDocente gd
            INNER JOIN 
                vDocentes d ON gd.idDocente = d.idDocente
            INNER JOIN 
                vGrupos g ON gd.idGrupo = g.idGrupo
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vGruposDocentes');
    }
};
