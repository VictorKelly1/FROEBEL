<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VDirector extends Model
{
    protected $table = 'vDirectores';
    protected $primaryKey = 'idDirector';
    public $incrementing = false; // La clave no es autoincremental

}
