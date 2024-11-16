<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW vIntendentes AS
        SELECT 
            i.idIntendente AS idIntendente, 
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
            i.Estado, 
            i.RFC, 
            i.NoINE, 
            i.Sueldo, 
            p.created_at AS PersonaCreatedAt,   
            p.updated_at AS PersonaUpdatedAt,   
            i.created_at AS IntendenteCreatedAt, 
            i.updated_at AS IntendenteUpdatedAt  
        FROM 
            Intendentes i
        INNER JOIN 
            Personas p ON i.idPersona = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vIntendentes');
    }
};
