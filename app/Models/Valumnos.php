<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VAlumno extends Model
{
    protected $table = 'vAlumnos';
    protected $primaryKey = 'idAlumno';
    public $incrementing = false; // La clave no es autoincremental

}
