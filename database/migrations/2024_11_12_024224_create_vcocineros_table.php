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
        CREATE VIEW vCocineros AS
        SELECT 
            c.idCocinero AS idCocinero, 
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
            c.Estado, 
            c.RFC, 
            c.NoINE, 
            c.Sueldo, 
            p.created_at AS PersonaCreatedAt,  
            p.updated_at AS PersonaUpdatedAt,  
            c.created_at AS CocineroCreatedAt,  
            c.updated_at AS CocineroUpdatedAt  
        FROM 
            Cocineros c
        INNER JOIN 
            Personas p ON c.idPersona = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vCocineros');
    }
};
