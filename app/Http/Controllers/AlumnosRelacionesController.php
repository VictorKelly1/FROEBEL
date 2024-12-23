<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\AlumnosRelacion;
use App\Models\VAlumno;
use App\Models\ValumnosRelaciones;
use App\Models\VTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosRelacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Alumnos = VAlumno::where('Estado', 'Activo')->get();
        $Tutores = VTutor::All();
        $AlumnosRalciones = ValumnosRelaciones::paginate(50);
        return view(
            'director.AsigAlumTutor',
            [
                'Alumnos' => $Alumnos,
                'AlumTutor' => $AlumnosRalciones,
                'Tutores' => $Tutores,
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
        DB::beginTransaction();
        try {

            $AlumRel = new AlumnosRelacion();

            $AlumRel->Tipo = $request->input('Tipo');
            $AlumRel->idAlumno = $request->input('idAlumno');
            $AlumRel->idTutor = $request->input('idTutor');

            $AlumRel->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'El tutor se asignó al alumno correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al asignar el Tutor: ' . $e->getMessage());
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
    public function destroy(AlumnosRelacion $TA)
    {
        // Elimina el registro de la tabla AlumnosRelaciones
        $TA->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaAlumnosRelaciones')->with('success', 'Registro eliminado correctamente.');
    }
}
