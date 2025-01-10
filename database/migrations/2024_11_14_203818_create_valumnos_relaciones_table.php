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

    //Relaciones:
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vAlumnosRelaciones AS
            SELECT 
                ar.idRelacion,
                ar.idTutor,
                ar.Tipo,
                vt.Nombre AS NombreTutor,
                vt.ApellidoPaterno AS ApellidoPaternoT,
                vt.ApellidoMaterno AS ApellidoMatT,
                ar.idAlumno,
                va.Nombre AS NombreAlum,
                va.Matricula,
                va.ApellidoPaterno AS ApellidoPatA,
                va.ApellidoMaterno AS ApellidoMatA
            FROM 
                AlumnosRelaciones ar
            INNER JOIN 
                vTutores vt ON ar.idTutor = vt.idTutor
            INNER JOIN 
                vAlumnos va ON ar.idAlumno = va.idAlumno
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vAlumnosRelaciones');
    }
};
