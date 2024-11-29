<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    //
    protected $table = 'Coordinadores';


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

        static::creating(function ($Coordinador) {
            self::validateAttributes($Coordinador);
        });

        static::updating(function ($Coordinador) {
            self::validateAttributes($Coordinador);
        });
    }

    // Función de validación
    private static function validateAttributes($Coordinador)
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
            if (empty($Coordinador->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
