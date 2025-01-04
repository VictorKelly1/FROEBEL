<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\Vcalificaciones;
use App\Models\VInasistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ModuloDocenteController extends Controller
{

    public function index()
    {
        return view('docente.Menu');
    }

    public function vistaComunicado()
    {
        return view('docente.Comunicado');
    }

    public function vistaComunicadoParticular(String $id)
    {
        return view('docenteDinamicas.Comunicado');
    }

    public function vistaHorario()
    {

        $idDocente = Session::get('idDocente');
        if (!$idDocente) {
            abort(403, 'Usuario no autorizado');
        }
        //
        $Grupos = DB::table('vGruposDocentes')
            ->where('idDocente', $idDocente)
            ->pluck('idGrupo');
        //
        $GM = DB::table('vGruposMaterias')
            ->whereIn('idGrupo', $Grupos)
            ->pluck('idGrupoMateria');
        //
        $Horarios = DB::table('vHorarios')
            ->whereIn('idGrupoMateria', $GM)
            ->get();

        return view('docente.Horarios', [
            'Horarios' => $Horarios,
        ]);
    }

    public function verGrupo(String $id)
    {

        $AlumnosDelGrupo = DB::table('vGruposAlumnos')
            ->where('idGrupo', $id)
            ->get();

        return view('docenteDinamicas.GrupoDocente', ['AlumnosDelGrupo' => $AlumnosDelGrupo]);
    }

    public function vistaInasistencias()
    {
        $id = Session::get('idPersona');
        $Inasist = VInasistencias::where('idPersona', $id);
        return view('docente.MisInasist', ['Inasistencias' => $Inasist]);
    }

    public function vistaCalificacion(String $id)
    {
        $Grupos = DB::table('vGruposAlumnos')
            ->where('idAlumno', $id)
            ->pluck('idGrupo');

        $GM = DB::table('vGruposMaterias')
            ->whereIn('idGrupo', $Grupos)
            ->pluck('idGrupoMateria');
        //

        foreach ($GM as $idGrupoMateria) {
            // Verifica si ya existe un registro en la tabla de Calificaciones
            $exists = Calificacion::where('idGruposMaterias', $idGrupoMateria)
                ->where('idAlumno', $id)
                ->exists();

            if (!$exists) {

                //
                $CP = new Calificacion();
                $CP->idAlumno = $id;
                $CP->idGruposMaterias = $idGrupoMateria;
                $CP->parcial1 = 0;
                $CP->parcial2 = 0;
                $CP->parcial3 = 0;
                $CP->parcial4 = 0;
                $CP->parcial5 = 0;
                $CP->parcial6 = 0;

                $CP->save();
            }
        }


        $Calificaciones = Vcalificaciones::where('idAlumno', $id)->get();
        return view('docenteDinamicas.RegisCalif', ['Calificaciones' => $Calificaciones]);
    }


    public function guardarCalificaciones(Request $request, string $id)
    {
        try {
            // Validar los datos enviados
            $request->validate([
                'Parcial1.*' => 'required|numeric|min:0|max:10',
                'Parcial2.*' => 'required|numeric|min:0|max:10',
                'Parcial3.*' => 'required|numeric|min:0|max:10',
                'Parcial4.*' => 'required|numeric|min:0|max:10',
                'Parcial5.*' => 'required|numeric|min:0|max:10',
                'Parcial6.*' => 'required|numeric|min:0|max:10',
            ]);

            DB::beginTransaction();

            foreach ($request->input('Parcial1') as $idCalificacion => $Parcial1) {
                $calificacion = [
                    'Parcial1' => $request->input("Parcial1.{$idCalificacion}"),
                    'Parcial2' => $request->input("Parcial2.{$idCalificacion}"),
                    'Parcial3' => $request->input("Parcial3.{$idCalificacion}"),
                    'Parcial4' => $request->input("Parcial4.{$idCalificacion}"),
                    'Parcial5' => $request->input("Parcial5.{$idCalificacion}"),
                    'Parcial6' => $request->input("Parcial6.{$idCalificacion}")
                ];

                // Solo actualizamos si existe el registro
                Calificacion::where('idCalificacion', $idCalificacion)
                    ->where('idAlumno', $id)
                    ->update($calificacion);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Calificaciones actualizadas correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            //\Log::error('Error al guardar calificaciones: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Ocurrió un error al guardar las calificaciones')
                ->withInput();
        }
    }


    public function listaRegistrarInasistencia()
    {
        return view('docente.RegisInasist');
    }
}

//historial calificaciones 