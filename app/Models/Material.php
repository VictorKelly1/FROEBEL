<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $table = 'Materiales';
    protected $primaryKey = 'idMaterial';
    protected $fillable = ['UnidadMedida', 'NombreMaterial', 'Cantidad', 'Costo'];
}
