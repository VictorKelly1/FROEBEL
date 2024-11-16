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
            CREATE VIEW vPlaneaciones AS
            SELECT 
                pl.idPlaneacion,
                pl.fecha,
                pl.cumplimiento,
                pl.idPersona,
                p.nombre,
                p.apellidoPaterno,
                p.apellidoMaterno,
                p.curp,
                p.fechaNacimiento,
                p.genero,
                p.ciudad,
                p.municipio,
                p.codigoPostal,
                p.colFrac,
                p.calle,
                p.numeroExterior,
                p.estadoCivil,
                p.nacionalidad,
                p.foto,
                p.created_at AS PersonaCreatedAt,
                p.updated_at AS PersonaUpdatedAt,
                pl.created_at AS PlaneacionCreatedAt,
                pl.updated_at AS PlaneacionUpdatedAt
            FROM 
                planeaciones pl
            INNER JOIN 
                personas p ON pl.idPersona = p.idPersona
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vPlaneaciones');
    }
};
