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
        CREATE VIEW vGruposAlumnos AS
        SELECT 
            ga.idGrupoAlumno, 
            ga.idAlumno,
            a.Nombre AS Nombre,
            a.ApellidoPaterno AS ApellidoPaterno,
            a.ApellidoMaterno AS ApellidoMaterno,
            a.Matricula AS Matricula,
            a.Estado AS Estado,
            ga.idGrupo,
            g.Paquete,
            g.NombreGrado,
            g.NivelAcademico
        FROM 
            GruposAlumnos ga
        INNER JOIN 
            vAlumnos a ON ga.idAlumno = a.idAlumno
        INNER JOIN 
            vGrupos g ON ga.idGrupo = g.idGrupo
      ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vGruposAlumnos');
    }
};
