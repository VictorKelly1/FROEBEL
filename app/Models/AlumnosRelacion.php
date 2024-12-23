<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnosRelacion extends Model
{
    protected $table = 'AlumnosRelaciones';
    protected $primaryKey = 'idRelacion';
    protected $fillable = ['idAlumno', 'idTutor', 'Tipo'];
}
