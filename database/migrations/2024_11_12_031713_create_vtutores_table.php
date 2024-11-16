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
        CREATE VIEW vTutores AS
        SELECT 
            t.idTutor AS idTutor, 
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
            t.NoINE, 
            t.RFC, 
            t.LugarTrabajo,
            p.created_at AS PersonaCreatedAt,   
            p.updated_at AS PersonaUpdatedAt,   
            t.created_at AS TutorCreatedAt,    
            t.updated_at AS TutorUpdatedAt     
        FROM 
            Tutores t
        INNER JOIN 
            Personas p ON t.idPersona = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vTutores');
    }
};
