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
        CREATE VIEW vComunicados AS
        SELECT 
            c.idComunicado,
            c.Titulo,
            c.Fecha,
            c.Destinatarios,
            c.Medio,
            c.Adjuntos,
            c.idEmisor,  
            p.Nombre,
            p.ApellidoPaterno,
            p.ApellidoMaterno,
            p.created_at AS PersonaCreatedAt,
            p.updated_at AS PersonaUpdatedAt,
            c.created_at AS ComunicadoCreatedAt, 
            c.updated_at AS ComunicadoUpdatedAt  
        FROM 
            Comunicados c
        INNER JOIN 
            Personas p ON c.idEmisor = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vComunicados');
    }
};
