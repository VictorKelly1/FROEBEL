<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vvestimenta extends Model
{
    //
    protected $table = 'vVestimentas';
    protected $primaryKey = 'idVestimenta';
    public $incrementing = false; // La clave no es autoincremental
}
