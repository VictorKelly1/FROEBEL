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
            CREATE VIEW vMaterialesIntendentes AS
            SELECT 
                mi.idMaterialIntendente,
                mi.idIntendente,
                i.Nombre AS NombreIntendente,
                i.ApellidoPaterno AS ApellidoPaternoIntendente,
                i.ApellidoMaterno AS ApellidoMaternoIntendente,
                m.idMaterial,
                m.NombreMaterial AS NombreMaterial,
                mi.Fecha
            FROM 
                MaterialesIntendentes mi
            INNER JOIN 
                vIntendentes i ON mi.idIntendente = i.idIntendente
            INNER JOIN 
                Materiales m ON mi.idMaterial = m.idMaterial
        ');
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vMaterialesIntendentes');
    }
};
