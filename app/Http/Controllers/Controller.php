<?php

namespace App\Http\Controllers;

use App\Models\VAdministrador;
use App\Models\VAlumno;
use App\Models\VCoordinador;
use App\Models\VDocente;

abstract class Controller
{
    //
    //Los index de los usuarios regresan json
    public function bajas()
    {
        //
        $Alumnos = VAlumno::where('Estado', 'Baja')
            ->paginate(50);
        $Docentes = VDocente::where('Estado', 'Baja')
            ->paginate(50);
        $Coordinadores = VCoordinador::where('Estado', 'Baja')
            ->paginate(50);
        $Administradores = VAdministrador::where('Estado', 'Baja')
            ->paginate(50);

        return view(
            'director.Bajas',
            [
                'Alumnos' => $Alumnos,
                'Docentes' => $Docentes,
                'Coordinadores' => $Coordinadores,
                'Administradores' => $Administradores,
            ]
        );
    }

    public function cambiarEstado(String $id)
    {
        //
    }
}
