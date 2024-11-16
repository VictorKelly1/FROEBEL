<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VCocinero extends Model
{
    protected $table = 'vCocineros';
    protected $primaryKey = 'idCocinero';
    public $incrementing = false; // La clave no es autoincremental

}
