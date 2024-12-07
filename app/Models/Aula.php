<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'Aulas';
    protected $primaryKey = 'idAula';
    protected $fillable = ['Nombre', 'Capacidad', 'Edificio', 'Tipo', 'Piso'];
}
