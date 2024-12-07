<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GruposMateria extends Model
{
    protected $table = 'GruposMat';
    protected $primaryKey = 'idGrupoMateria';
    protected $fillable = ['idMateria', 'idGrupo'];
}
