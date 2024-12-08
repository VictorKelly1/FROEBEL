<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'Tutores';
    protected $primaryKey = 'idTutor';


    // Campos permitidos para asignación masiva
    protected $fillable = [
        'LugarTrabajo',
        'NoINE',
        'RFC',
        'idPersona',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Tutor) {
            self::validateAttributes($Tutor);
        });

        static::updating(function ($Tutor) {
            self::validateAttributes($Tutor);
        });
    }

    // Función de validación
    private static function validateAttributes($Tutor)
    {
        $requiredFields = [
            'LugarTrabajo',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Tutor->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
