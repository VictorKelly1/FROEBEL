<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'Administradores';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Estado',
        'Sueldo',
        'NoINE',
        'RFC',
        'idPersona',
        'idUsuario',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Administrador) {
            self::validateAttributes($Administrador);
        });

        static::updating(function ($Administrador) {
            self::validateAttributes($Administrador);
        });
    }

    // Función de validación
    private static function validateAttributes($Administrador)
    {
        $requiredFields = [
            'Estado',
            'Sueldo',
            'NoINE',
            'RFC',
            'idPersona',
            'idUsuario',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Administrador->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
