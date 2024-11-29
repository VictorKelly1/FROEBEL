<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intendente extends Model
{
    //
    protected $table = 'Intendentes';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Estado',
        'Sueldo',
        'NoINE',
        'RFC',
        'idPersona',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Intendente) {
            self::validateAttributes($Intendente);
        });

        static::updating(function ($Intendente) {
            self::validateAttributes($Intendente);
        });
    }

    // Función de validación
    private static function validateAttributes($Intendente)
    {
        $requiredFields = [
            'Estado',
            'Sueldo',
            'NoINE',
            'RFC',
            'idPersona',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Intendente->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
