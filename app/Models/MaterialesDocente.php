<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialesDocente extends Model
{
    protected $table = 'MaterialesDocentes';
    protected $primaryKey = 'idMaterialDocente';
    protected $fillable = ['idMaterial', 'idDocente'];
}
