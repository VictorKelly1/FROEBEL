<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//
use Laravel\Socialite\Facades\Socialite;
//
use App\Models\User;
use App\Models\VAdministrador;
use App\Models\VAlumno;
use App\Models\VCoordinador;
use App\Models\VDirector;
use App\Models\VDocente;
//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SSO extends Controller
{
    //
    public function redirect()
    {
        //
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user_google = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $user_google->email], // Condición para buscar el usuario
            [
                'idGoogle' => $user_google->id,
                'name' => $user_google->name,
                'email' => $user_google->email,
            ]
        );

        //variables de usuario
        Auth::login($user);

        // lista los permisos con su respectivo menu 
        $permisos = [
            'Alumno' => ['model' => VAlumno::class, 'view' => 'alumno.Menu'],
            'Docente' => ['model' => VDocente::class, 'view' => 'docente.Menu'],
            'Coordinador' => ['model' => VCoordinador::class, 'view' => 'coordinador.Menu'],
            'Administrador' => ['model' => VAdministrador::class, 'view' => 'administrador.Menu'],
            'Director' => ['model' => VDirector::class, 'view' => 'director.Menu'],
        ];

        foreach ($permisos as $permiso => $role) {
            if ($role['model']::where('idUsuario', $user->id)->exists()) {
                Session::put('Permiso', $permiso);
                //
                $persona = $role['model']::where('idUsuario', $user->id)->first();
                $nombre = $persona->Nombre . ' ' . $persona->ApellidoPaterno . ' ' . $persona->ApellidoMaterno;
                //
                Session::put('Nombre', $nombre);

                Session::put('idPersona', $persona->idPersona);

                Session::put('Foto', $persona->Foto);

                Session::put('CURP', $persona->CURP);

                //si es alumno se obtiene la id del alumno 
                if ($permiso === 'Alumno') {
                    //
                    $idAlumno = DB::table('Alumnos')
                        ->where('idPersona', $persona->idPersona)
                        ->value('idAlumno');

                    $Estado =  DB::table('Alumnos')
                        ->where('idPersona', $persona->idPersona)
                        ->value('Estado');

                    Session::put('Estado', $Estado);
                    Session::put('idAlumno', $idAlumno);
                }

                //si es alumno se obtiene la id del alumno y sus grupos asociados
                if ($permiso === 'Docente') {
                    //
                    $idDocente = DB::table('Docentes')
                        ->where('idPersona', $persona->idPersona)
                        ->value('idDocente');

                    $Estado =  DB::table('Docentes')
                        ->where('idPersona', $persona->idPersona)
                        ->value('Estado');

                    Session::put('Estado', $Estado);
                    Session::put('idDocente', $idDocente);
                    //

                    // $Grupos = DB::table('vGruposDocentes')
                    //     ->select('idGrupoDocente', 'idGrupo', 'NombreGrado', 'ClavePeriodo', 'Paquete', 'NivelAcademico')
                    //     ->where('idDocente', $idDocente)
                    //     ->get();
                    $Grupos = DB::table('vGruposDocentes')
                        ->select('idGrupoDocente', 'idGrupo', 'NombreGrado', 'ClavePeriodo', 'Paquete', 'NivelAcademico')
                        ->where('idDocente', $idDocente)
                        ->whereRaw('SUBSTRING(ClavePeriodo, 1, 4) = (
                                        SELECT MAX(SUBSTRING(ClavePeriodo, 1, 4)) 
                                        FROM vGruposDocentes 
                                        WHERE idDocente = ?
                                    )', [$idDocente])
                        ->get();

                    Session::put('Grupos', $Grupos);
                }
                //
                return redirect()->route('Menu' . $permiso);
            }
        }

        return redirect()->route('log')->with('error', 'Usuario no encontrado intentalo de nuevo.');
    }
}
