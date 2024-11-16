<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VCoordinador extends Model
{
    protected $table = 'vCoordinadores';
    protected $primaryKey = 'idCoordinador';
    public $incrementing = false; // La clave no es autoincremental

}
