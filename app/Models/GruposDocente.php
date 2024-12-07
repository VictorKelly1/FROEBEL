<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GruposDocente extends Model
{
    protected $table = 'GruposDocentes';
    protected $primaryKey = 'idGrupoDocente';
    protected $fillable = ['idDocente', 'idGrupo'];
}
