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
    public function up()
    {
        DB::statement('
        CREATE VIEW vAlumnos AS
        SELECT 
            a.idAlumno AS idAlumno, 
            p.idPersona, 
            p.Nombre, 
            p.ApellidoPaterno, 
            p.ApellidoMaterno, 
            p.CURP, 
            p.FechaNacimiento, 
            p.Genero, 
            p.Ciudad, 
            p.Municipio, 
            p.CodigoPostal, 
            p.ColFrac, 
            p.Calle, 
            p.NumeroExterior, 
            p.EstadoCivil, 
            p.Nacionalidad, 
            p.Foto,
            a.Matricula, 
            a.Estado, 
            a.FechaIngreso, 
            a.EscuelaProcede, 
            a.idUsuario,
            p.created_at AS PersonaCreatedAt,   
            p.updated_at AS PersonaUpdatedAt,   
            a.created_at AS AlumnoCreatedAt,   
            a.updated_at AS AlumnoUpdatedAt    
        FROM 
            Alumnos a
        INNER JOIN 
            Personas p ON a.idPersona = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vAlumnos');
    }
};
