<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Horario;
use App\Models\VgruposMaterias;
use App\Models\Vhorarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Aulas = Aula::All();
        $GrupMat = VgruposMaterias::All();
        //
        $ultimoPeriodo = DB::table('vGruposAlumnos')
            ->select('ClavePeriodo')
            ->get()
            ->map(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->max();

        // Obtenemos solo los grupos de ese período
        $Grupos = DB::table('vGruposAlumnos')
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
            ->pluck('idGrupo');
        //
        $GM = DB::table('vGruposMaterias')
            ->whereIn('idGrupo', $Grupos)
            ->pluck('idGrupoMateria');
        //
        $Horarios = DB::table('vHorarios')
            ->whereIn('idGrupoMateria', $GM)
            ->paginate(50);
        //
        return view(
            'director.Horario',
            [
                'Aulas' => $Aulas,
                'GrupMat' => $GrupMat,
                'Horarios' => $Horarios,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'idAula' => 'required',
            'idGrupoMat' => 'required',
            'HoraL' => 'required',
            'HoraM' => 'required',
            'HoraMi' => 'required',
            'HoraJ' => 'required',
            'HoraV' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //
            $Horario = new Horario();

            $Horario->idAula = $request->input('idAula');
            $Horario->idGrupoMateria = $request->input('idGrupoMat'); //no es idMateria es idGrupoMateria(hay un error en la base de datos en el nombre de una columna)
            $Horario->HoraL = $request->input('HoraL');
            $Horario->HoraM = $request->input('HoraM');
            $Horario->HoraMi = $request->input('HoraMi');
            $Horario->HoraJ = $request->input('HoraJ');
            $Horario->HoraV = $request->input('HoraV');

            $Horario->save();
            //
            DB::commit();

            return back()->with('success', 'El horario se establecio correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al establecer el horario: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $H)
    {
        // Elimina el registro de la tabla GruposMaterias
        $H->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return back()->with('success', 'La materia se retiro del horario correctamente.');
    }
}
