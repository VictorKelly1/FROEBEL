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
        CREATE VIEW vContactos AS
        SELECT 
            c.idContacto AS idContacto,
            c.TipoContacto,
            c.ValorContacto,
            c.idReceptor AS idPersona, 
            p.Nombre, 
            p.ApellidoPaterno, 
            p.ApellidoMaterno, 
            p.created_at AS PersonaCreatedAt,  
            p.updated_at AS PersonaUpdatedAt,  
            c.created_at AS ContactoCreatedAt,  
            c.updated_at AS ContactoUpdatedAt   
        FROM 
            Contactos c
        INNER JOIN 
            Personas p ON c.idReceptor = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vComunicados');
    }
};
