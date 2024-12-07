<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'Calificaciones';
    protected $primaryKey = 'idCalificacion';
    protected $fillable = ['idAlumno', 'idMateria', 'parcial1', 'parcial2', 'parcial3', 'parcial4', 'parcial5', 'parcial6'];
}
