<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VgruposDocentes extends Model
{
    //
    protected $table = 'vGruposDocentes';
    protected $primaryKey = 'idGrupoDocente';
    public $incrementing = false;
    public $timestamps = false;
}
