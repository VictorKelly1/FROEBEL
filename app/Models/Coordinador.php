<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    //
    protected $table = 'Coordinadores';
    protected $primaryKey = 'idCoordinador';

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
}
