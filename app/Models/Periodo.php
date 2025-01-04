<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Periodos';
    protected $primaryKey = 'idPeriodo';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'Clave',
        'FechaInicio',
        'FechaFin',
        'Tipo',
    ];
}
