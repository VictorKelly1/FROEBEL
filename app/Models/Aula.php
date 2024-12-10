<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'Aulas';
    protected $primaryKey = 'idAula';
    protected $fillable = ['Nombre', 'Capacidad', 'Edificio', 'Tipo', 'Piso'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Aula) {
            self::validateAttributes($Aula);
        });

        static::updating(function ($Aula) {
            self::validateAttributes($Aula);
        });
    }

    // Función de validación
    private static function validateAttributes($Aula)
    {
        $requiredFields = [
            'Nombre',
            'Edificio',
            'Tipo',
            'Piso',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Aula->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
