<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VTutor extends Model
{
    protected $table = 'vTutores';
    protected $primaryKey = 'idTutor';
    public $incrementing = false; // La clave no es autoincremental

}
