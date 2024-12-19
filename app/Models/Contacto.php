<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $table = 'Contactos';
    protected $primaryKey = 'idContacto';
    protected $fillable = [
        'idReceptor',
        'ValorContacto',
        'TipoContacto'
    ];
}
