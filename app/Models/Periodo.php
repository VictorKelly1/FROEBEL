<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Periodos';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Clave',
        'FechaInicio',
        'FechaFin',
        'Tipo',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Periodos) {
            self::validateAttributes($Periodos);
        });

        static::updating(function ($Periodos) {
            self::validateAttributes($Periodos);
        });
    }

    // Función de validación
    private static function validateAttributes($Periodos)
    {
        $requiredFields = [
            'Clave',
            'FechaInicio',
            'FechaFin',
            'Tipo',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Periodos->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
