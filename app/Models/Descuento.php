<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'Descuentos';
    protected $primaryKey = 'idDescuento';
    protected $fillable = ['Nombre', 'Tipo', 'Monto'];
}
