<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'Conceptos';
    protected $primaryKey = 'idConcepto';
    protected $fillable = ['Nombre', 'Descripcion'];
}
