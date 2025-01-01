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
        CREATE VIEW vInasistencias AS
        SELECT 
            i.idInasistencia,
            i.Fecha,
            i.Motivo,
            i.idPersona,
            p.Nombre,
            p.ApellidoPaterno,
            p.ApellidoMaterno,
            p.Foto,
            p.created_at AS PersonaCreatedAt,   
            p.updated_at AS PersonaUpdatedAt,   
            i.created_at AS InasistenciaCreatedAt, 
            i.updated_at AS InasistenciaUpdatedAt  
        FROM 
            Inasistencias i
        INNER JOIN 
            Personas p ON i.idPersona = p.idPersona
    ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vInasistencias');
    }
};
