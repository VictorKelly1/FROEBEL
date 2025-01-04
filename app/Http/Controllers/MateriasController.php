<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
{
    /* 
    Se obtiene una lista con todos los alumnos activos
    */
    public function index()
    {
        //
    }

    /*
    Regresa la vista para registrar un alumno
    */
    public function create()
    {
        $Materias = Materia::paginate(50);
        return view('director.RegisMat', ['Materias' => $Materias]);
    }

    /*Almacena una materia en la base de datos */
    public function store(Request $request)
    {

        $request->validate([
            'Clave' => 'required',
            'NombreMateria' => 'required|string',
            'Tipo' => 'required',
        ]);

        DB::beginTransaction();

        try {
            //
            $Materia = new Materia();

            $Materia->Clave = $request->input('Clave');
            $Materia->NombreMateria = $request->input('NombreMateria');
            $Materia->Tipo = $request->input('Tipo');

            $Materia->save();

            // Confirmar transacción
            DB::commit();

            return redirect()->route('ListaMaterias')->with('success', 'Materia registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return 'error';
            return redirect()->back()->with('error', 'Error al registrar la materia: ' . $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        // Verificar si se encontró el alumno
        if (!$id) {
            return response()->json(['error' => 'Materia no encontrado'], 404);
        } else {
            return view('dinamicas.EditarMateria', ['Materia' => $id]);
        }
    }

    /*
    Regresa la vista dinamica para editar un alumno 
    */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'Clave' => 'required|string',
            'Nombre' => 'required|string',
            'Tipo' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //Objeto concepto
            $Materia = Materia::findOrFail($id);

            $Materia->Descripcion = $request->input('Clave');
            $Materia->NombreMateria = $request->input('Nombre');
            $Materia->Tipo = $request->input('Tipo');

            $Materia->save();

            //confirmar transaccion
            DB::commit();

            return view('director.RegisConcep');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el concepto: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
