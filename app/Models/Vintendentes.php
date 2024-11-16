<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VIntendente extends Model
{
    protected $table = 'vIntendentes';
    protected $primaryKey = 'idIntendente';
    public $incrementing = false; // Importante si la clave no es autoincremental

}
