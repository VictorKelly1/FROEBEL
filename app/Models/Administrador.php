<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'Administradores';
    protected $primaryKey = 'idAdministrador';

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

        static::creating(function ($Administrador) {
            self::validateAttributes($Administrador);
        });

        static::updating(function ($Administrador) {
            self::validateAttributes($Administrador);
        });
    }
}
