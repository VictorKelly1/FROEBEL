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
            CREATE VIEW vMaterialesDocentes AS
            SELECT 
                md.idMaterialDocente,
                md.idDocente,
                d.Nombre AS NombreDocente,
                d.ApellidoPaterno AS ApellidoPaternoDocente,
                d.ApellidoMaterno AS ApellidoMaternoDocente,
                m.idMaterial,
                m.NombreMaterial AS NombreMaterial,
                md.Fecha
            FROM 
                MaterialesDocentes md
            INNER JOIN 
                vDocentes d ON md.idDocente = d.idDocente
            INNER JOIN 
                Materiales m ON md.idMaterial = m.idMaterial
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vMaterialesDocentes');
    }
};
