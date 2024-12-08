<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $table = 'Docentes';
    protected $primaryKey = 'idDocente';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Carrera',
        'Estado',
        'FechaIngreso',
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

        static::creating(function ($Docente) {
            self::validateAttributes($Docente);
        });

        static::updating(function ($Docente) {
            self::validateAttributes($Docente);
        });
    }

    // Función de validación
    private static function validateAttributes($Docente)
    {
        $requiredFields = [
            'Carrera',
            'Estado',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Docente->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
