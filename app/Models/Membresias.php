<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    //
    protected $table = 'Membresias';
    protected $fillable = ['Recurrencia', 'Costo', 'NivelAcademico'];
}
