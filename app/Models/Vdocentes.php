<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VDocente extends Model
{
    protected $table = 'vDocentes';
    protected $primaryKey = 'idDocente';
    public $incrementing = false; // La clave no es autoincremental

}
