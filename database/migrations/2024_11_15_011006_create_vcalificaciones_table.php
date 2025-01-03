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
            CREATE VIEW vCalificaciones AS
            SELECT 
                c.idCalificacion,
                c.idGruposMaterias,
                gm.NombreMateria,
                gm.TipoMateria,
                gm.NombreGrado,
                gm.Paquete,
                gm.NivelAcademico,
                gm.ClavePeriodo,
                c.idAlumno,
                a.Nombre AS NombreAlumno,
                a.ApellidoPaterno,
                a.ApellidoMaterno,
                c.Parcial1,
                c.Parcial2,
                c.Parcial3,
                c.Parcial4,
                c.Parcial5,
                c.Parcial6
            FROM 
                Calificaciones c
            INNER JOIN 
                vGruposMaterias gm ON c.idGruposMaterias = gm.idGrupoMateria
            INNER JOIN 
                vAlumnos a ON c.idAlumno = a.idAlumno
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vCalificaciones');
    }
};
