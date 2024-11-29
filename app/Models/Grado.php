<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Grados';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'NombreGrado',
        'NivelAcademico',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Grados) {
            self::validateAttributes($Grados);
        });

        static::updating(function ($Grados) {
            self::validateAttributes($Grados);
        });
    }

    // Función de validación
    private static function validateAttributes($Grados)
    {
        $requiredFields = [
            'NombreGrado',
            'NivelAcademico',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Grados->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
