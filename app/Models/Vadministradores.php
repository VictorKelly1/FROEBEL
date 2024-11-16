<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VAdministrador extends Model
{
    protected $table = 'vAdministradores';
    protected $primaryKey = 'idAdministrador';
    public $incrementing = false; // La clave no es autoincremental

}
