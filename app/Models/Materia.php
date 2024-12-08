<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'Materias';
    protected $primaryKey = 'idMateria';
    protected $fillable = ['Clave', 'NombreMateria', 'Tipo'];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Materia) {
            self::validateAttributes($Materia);
        });

        static::updating(function ($Materia) {
            self::validateAttributes($Materia);
        });
    }

    // Función de validación
    private static function validateAttributes($Materia)
    {
        $requiredFields = [
            'Clave',
            'NombreMateria',
            'Tipo'
        ];

        foreach ($requiredFields as $field) {
            if (empty($Materia->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
