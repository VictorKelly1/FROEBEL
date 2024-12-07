<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Grupos';
    protected $primaryKey = 'idGrupo';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'CantidadAlum',
        'Paquete',
        'idGrado',
        'idPeriodo',
    ];

    // Reglas de validación para los atributos
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Grupos) {
            self::validateAttributes($Grupos);
        });

        static::updating(function ($Grupos) {
            self::validateAttributes($Grupos);
        });
    }

    // Función de validación
    private static function validateAttributes($Grupos)
    {
        $requiredFields = [
            'Paquete',
            'idGrado',
            'idPeriodo',
        ];

        foreach ($requiredFields as $field) {
            if (empty($Grupos->{$field})) {
                throw new \Exception("El campo {$field} es obligatorio.");
            }
        }
    }
}
