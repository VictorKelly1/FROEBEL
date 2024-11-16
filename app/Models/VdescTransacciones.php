<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VdescTransacciones extends Model
{
    //
    protected $table = 'vDescTransacciones';
    protected $primaryKey = 'idDescTransaccion';
    public $incrementing = false;
    public $timestamps = false;
}
