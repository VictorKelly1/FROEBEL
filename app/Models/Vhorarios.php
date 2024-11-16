<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vhorarios extends Model
{
    //
    protected $table = 'vHorarios';
    protected $primaryKey = 'idHorario';
    public $incrementing = false;
    public $timestamps = false;
}
