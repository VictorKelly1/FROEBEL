<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\Vcalificaciones;
use App\Models\VInasistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $ultimoPeriodo = DB::table('vGruposAlumnos')
            ->select('ClavePeriodo')
            ->get()
            ->map(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->max();
        //
        $Grupos = DB::table('vGruposDocentes')
            ->where('idDocente', $idDocente)
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
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

        $NA = DB::table('vGrupos')
            ->where('idGrupo', $id)
            ->value('NivelAcademico');

        return view('docenteDinamicas.GrupoDocente', [
            'AlumnosDelGrupo' => $AlumnosDelGrupo,
            'idGrupo' => $id,
            'NivelAcademico' => $NA
        ]);
    }

    public function vistaInasistencias()
    {
        $id = Session::get('idPersona');
        $Inasist = VInasistencias::where('idPersona', $id);
        return view('docente.MisInasist', ['Inasistencias' => $Inasist]);
    }

    public function vistaCalificacion(String $id, Request $request)
    {
        //
        $ultimoPeriodo = DB::table('vGruposAlumnos')
            ->where('idAlumno', $id)
            ->select('ClavePeriodo')
            ->get()
            ->map(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->max();

        // Obtenemos solo los grupos de ese período
        $Grupos = DB::table('vGruposAlumnos')
            ->where('idAlumno', $id)
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
            ->pluck('idGrupo');
        //

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
                $CP->parcial1 = " ";
                $CP->parcial2 = " ";
                $CP->parcial3 = " ";
                $CP->parcial4 = " ";
                $CP->parcial5 = " ";
                $CP->parcial6 = " ";

                $CP->save();
            }
        }


        $ultimoPeriodo = Vcalificaciones::where('idAlumno', $id)
            ->select('ClavePeriodo')
            ->distinct()
            ->get()
            ->map(function ($cal) {
                return substr($cal->ClavePeriodo, 0, 4);
            })
            ->max();

        // Obtenemos solo las calificaciones de ese período
        $idGrupo = $request->input('idGrupo');

        $idsGM = DB::table('vGruposMaterias')
            ->where('idGrupo', $idGrupo)
            ->pluck('idGrupoMateria');

        $Calificaciones = Vcalificaciones::where('idAlumno', $id)
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
            ->whereIn('idGruposMaterias', $idsGM)
            ->get();
        //
        if ($request->input('NivelAcademico') == 'Kinder' || $request->input('NivelAcademico') == 'Guarderia') {

            return view('docenteDinamicas.RegisCalifKinder', ['Calificaciones' => $Calificaciones]);
        }

        //
        return view('docenteDinamicas.RegisCalif', ['Calificaciones' => $Calificaciones]);
    }


    public function guardarCalificaciones(Request $request, string $id)
    {
        try {
            // Validar los datos enviados

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


    public function listaRegistrarInasistencia(String $id)
    {

        //
        $AlumnosDelGrupo = DB::table('vGruposAlumnos')
            ->where('idGrupo', $id)
            ->get();

        return view('docenteDinamicas.RegisInasist', ['AlumnosDelGrupo' => $AlumnosDelGrupo]);
    }

    public function RegistrarInasistencias(Request $request)
    {
        try {
            $alumnosIds = $request->input('seleccionar'); // Asegúrate de que sea un array

            // Obtén la fecha actual
            $fechaHoy = date('Y-m-d');

            // Recupera las idPersona correspondientes a los alumnos
            $personasIds = DB::table('Alumnos')
                ->whereIn('idAlumno', $alumnosIds) // id es la columna que identifica a los alumnos
                ->pluck('idPersona')
                ->toArray();

            $inasistencias = array_map(function ($idPersona) use ($fechaHoy) {
                return [
                    'fecha' => $fechaHoy,
                    'motivo' => 'Injustificado',
                    'idPersona' => $idPersona,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $personasIds);

            DB::table('Inasistencias')->insert($inasistencias);

            return redirect()->route('MenuDocente')->with('success', 'Inasistencias registradas.');
        } catch (\Exception $e) {

            return redirect()->route('MenuDocente')->with('error', 'Ya has nombrado lista el dia de hoy' . $e->getMessage());
        }
    }

    public function inasistenciasParticulares(String $id)
    {
        $Inasistencias = DB::table('Inasistencias')
            ->where('idPersona', $id)
            ->paginate(50);

        return view('dinamicas.InasistPersonal', ['Inasistencias' => $Inasistencias]);
    }
}

//historial calificaciones 