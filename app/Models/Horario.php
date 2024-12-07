<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'Horarios';
    protected $primaryKey = 'idHorario';
    protected $fillable = ['idAula', 'idMateria', 'HoraL', 'HoraM', 'HoraMi', 'HoraJ', 'HoraV'];
}
