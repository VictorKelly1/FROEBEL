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

        $user = User::updateOrCreate([
            'idGoogle' => $user_google->id,
        ], [
            'name' => $user_google->name,
            'email' => $user_google->email,
            'idGoogle' => $user_google->id,
        ]);

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
                Session::put('Nombre', $nombre);

                Session::put('idPersona', $persona->idPersona);

                Session::put('Foto', $persona->Foto);

                // si es alumno se obtiene la id del alumno
                Session::put('CURP', $persona->CURP);
                if ($permiso === 'Alumno') {
                    //
                    $idAlumno = DB::table('Alumnos')
                        ->where('idPersona', $persona->idPersona)
                        ->value('idAlumno');

                    Session::put('idAlumno', $idAlumno);
                }

                return view($role['view']);
            }
        }

        return redirect()->route('Raiz')->with('error', 'Usuario no encontrado intentalo de nuevo.');
    }
}
