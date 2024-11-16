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
            CREATE VIEW vDocentes AS
            SELECT 
                d.idDocente AS idDocente, 
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
                d.Carrera, 
                d.FechaIngreso, 
                d.Estado, 
                d.RFC, 
                d.NoINE, 
                d.Sueldo, 
                d.idUsuario,
                p.created_at AS PersonaCreatedAt, 
                p.updated_at AS PersonaUpdatedAt, 
                d.created_at AS DocenteCreatedAt, 
                d.updated_at AS DocenteUpdatedAt  
            FROM 
                Docentes d
            INNER JOIN 
                Personas p ON d.idPersona = p.idPersona
        ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vDocentes');
    }
};
