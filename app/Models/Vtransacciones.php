<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vtransacciones extends Model
{
    //
    protected $table = 'vTransacciones';
    protected $primaryKey = 'idTransaccion';
    public $incrementing = false;
    public $timestamps = false;
}
