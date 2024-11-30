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
        $Materias = Materia::All();
        return view('director.ConsultasMaterias', ['Materias' => $Materias]);
    }

    /*
    Regresa la vista para registrar un alumno
    */
    public function create()
    {
        return view('director.RegisMateria');
    }

    /*Almacena una materia en la base de datos */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {


            // Confirmar transacción
            DB::commit();

            return view('director.RegisMateria');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

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
    public function update(Request $request)
    {
        //

    }


    public function destroy(string $id)
    {
        //
    }
}
