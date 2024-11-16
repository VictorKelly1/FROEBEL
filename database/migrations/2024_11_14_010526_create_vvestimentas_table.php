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
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vVestimentas AS
            SELECT 
                v.idVestimenta,
                v.Fecha,
                v.Motivo,
                v.idPersona,
                p.Nombre,
                p.ApellidoPaterno,
                p.ApellidoMaterno,
                p.Foto,
                p.created_at AS PersonaCreatedAt,
                p.updated_at AS PersonaUpdatedAt,
                v.created_at AS VestimentaCreatedAt,
                v.updated_at AS VestimentaUpdatedAt
            FROM 
                vestimentas v
            INNER JOIN 
                personas p ON v.idPersona = p.idPersona
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vVestimentas');
    }
};
