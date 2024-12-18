<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    //
    protected $table = 'Comunicados';
    protected $primaryKey = 'idComunicado';
    protected $fillable = [
        'Titulo',
        'Fecha',
        'Destinatarios',
        'Medio',
        'idEmisor',
        'Adjuntos'
    ];
}
