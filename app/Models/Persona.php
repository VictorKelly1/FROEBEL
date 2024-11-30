<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    //use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'Personas';


    // Campos permitidos para asignación masiva
    // protected $fillable = [
    //     'Nombre',
    //     'ApellidoMaterno',
    //     'ApellidoPaterno',
    //     'CURP',
    //     'FechaNacimiento',
    //     'Genero',
    //     'Ciudad',
    //     'Municipio',
    //     'CodigoPostal',
    //     'ColFrac',
    //     'Calle',
    //     'NumeroExterior',
    //     'EstadoCivil',
    //     'Nacionalidad',
    //     'Foto',
    // ];

    // // Reglas de validación para los atributos
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($Persona) {
    //         self::validateAttributes($Persona);
    //     });

    //     static::updating(function ($Persona) {
    //         self::validateAttributes($Persona);
    //     });
    // }

    // // Función de validación
    // private static function validateAttributes($Persona)
    // {
    //     $requiredFields = [
    //         'Nombre',
    //         'ApellidoMaterno',
    //         'ApellidoPaterno',
    //         'CURP',
    //         'FechaNacimiento',
    //         'Genero',
    //         'Ciudad',
    //         'Municipio',
    //         'CodigoPostal',
    //         'ColFrac',
    //         'Calle',
    //         'NumeroExterior',
    //         'EstadoCivil',
    //         'Nacionalidad',
    //     ];

    //     foreach ($requiredFields as $field) {
    //         if (empty($Persona->{$field})) {
    //             throw new \Exception("El campo {$field} es obligatorio.");
    //         }
    //     }

    //     // Validar longitud del CURP
    //     if (strlen($Persona->CURP) !== 18) {
    //         throw new \Exception('El CURP debe tener exactamente 18 caracteres.');
    //     }
    // }

    // // Lista de campos a capitalizar(capitalizar es Poner cada palabra ingresada con la primera letra mayuscula y las demas minusculas)
    // private $capitalizeFields = [
    //     'Nombre',
    //     'ApellidoMaterno',
    //     'ApellidoPaterno',
    //     'Ciudad',
    //     'Municipio',
    //     'ColFrac',
    //     'Calle',
    //     'EstadoCivil',
    //     'Nacionalidad',
    // ];

    // // Sobreescribir setAttribute para transformar los datos
    // public function setAttribute($key, $value)
    // {
    //     if (in_array($key, $this->capitalizeFields) && is_string($value)) {
    //         // Capitalizar cada palabra
    //         $value = ucwords(strtolower($value));
    //     }

    //     return parent::setAttribute($key, $value);
    // }
}
