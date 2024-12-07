<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'Materias';
    protected $primaryKey = 'idMateria';
    protected $fillable = ['Clave', 'NombreMateria', 'Tipo'];
}
