<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fijo extends Model
{
    //
    protected $table = 'Fijos';
    protected $primaryKey = 'idFijo';
    protected $fillable = ['NombreArticulo', 'Categoria', 'Cantidad'];
}
