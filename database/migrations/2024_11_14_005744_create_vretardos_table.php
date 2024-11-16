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
            CREATE VIEW vRetardos AS
            SELECT 
                r.idRetardo AS idRetardo,
                r.Fecha, 
                r.Motivo,
                r.IdPersona,   
                p.Nombre, 
                p.ApellidoPaterno, 
                p.ApellidoMaterno, 
                p.Foto,
                p.created_at AS PersonaCreatedAt,  
                p.updated_at AS PersonaUpdatedAt,  
                r.created_at AS RetardoCreatedAt,  
                r.updated_at AS RetardoUpdatedAt   
            FROM 
                Retardos r
            INNER JOIN 
                Personas p ON r.IdPersona = p.idPersona
        ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vRetardos');
    }
};
