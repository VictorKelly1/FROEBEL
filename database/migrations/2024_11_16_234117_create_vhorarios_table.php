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
            CREATE VIEW vHorarios AS
            SELECT 
                h.idHorario,
                h.idAula,
                a.Nombre AS NombreAula,
                h.idGrupoMateria,
                gm.ClavePeriodo AS ClavePeriodo,
                gm.NombreMateria AS NombreMateria,
                h.HoraL,
                h.HoraM,
                h.HoraMi,
                h.HoraJ,
                h.HoraV
            FROM 
                Horarios h
            INNER JOIN 
                Aulas a ON h.idAula = a.idAula
            INNER JOIN 
                vGruposMaterias gm ON h.idGrupoMateria = gm.idGrupoMateria
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vHorarios');
    }
};
