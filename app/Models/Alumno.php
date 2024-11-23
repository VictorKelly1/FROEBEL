<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Alumnos';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Matricula',
        'Estado',
        'FechaIngreso',
        'EscuelaProcede',
        'idPersona',
        'idUsuario',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Alumno) {
            self::validateAttributes($Alumno);
        });

        static::updating(function ($Alumno) {
            self::validateAttributes($Alumno);
        });
    }

    // Función de validación
    private static function validateAttributes($Persona)
    {
        $requiredFields = [
            'Matricula',
            'Estado',
            'FechaIngreso',
            'EscuelaProcede',
            'idPersona',
            'idUsuario',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Alumno->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
