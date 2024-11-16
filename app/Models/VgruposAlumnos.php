<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VgruposAlumnos extends Model
{
    //
    protected $table = 'vGruposAlumnos';
    protected $primaryKey = 'idGrupoAlumno';
    public $incrementing = false;
    public $timestamps = false;
}
