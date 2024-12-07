<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GruposAlumno extends Model
{
    //
    protected $table = 'GruposAlumnos';
    protected $primaryKey = 'idGrupoAlumno';
    protected $fillable = ['idAlumno', 'idGrupo'];
}
