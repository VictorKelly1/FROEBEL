<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\User;
use App\Models\VDocente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{

    public function index()
    {
        //
        $Docentes = VDocente::where('Estado', 'Activo')->get();
        return response()->json($Docentes);
    }

    public function create()
    {
        //
        return view('director.RegisDocen');
    }

    public function store(Request $request)
    {
        /* 
        Funcion para registrar un docente en la base de datos guardando los datos en las respectivas
        tablas y asignandole un correo al momento de su creacion para que tenga acceso al sistema
        */
        $request->validate([
            'Nombre' => 'required|string',
            'ApellidoMaterno' => 'required|string',
            'ApellidoPaterno' => 'required|string',
            'Ciudad' => 'required|string',
            'Municipio' => 'required|string',
            'ColFrac' => 'required|string',
            'Calle' => 'required|string',
            'EstadoCivil' => 'required|string',
            'Nacionalidad' => 'required|string',
            'Correo' => 'required|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Persona
            $Persona = new Persona();
            $Persona->Nombre = $request->input('Nombre');
            $Persona->ApellidoMaterno = $request->input('ApellidoMaterno');
            $Persona->ApellidoPaterno = $request->input('ApellidoPaterno');
            $Persona->CURP = $request->input('CURP');
            $Persona->FechaNacimiento = $request->input('FechaNacimiento');
            $Persona->Genero = $request->input('Genero');
            $Persona->Ciudad = $request->input('Ciudad');
            $Persona->Municipio = $request->input('Municipio');
            $Persona->CodigoPostal = $request->input('CodigoPostal');
            $Persona->ColFrac = $request->input('ColFrac');
            $Persona->Calle = $request->input('Calle');
            $Persona->NumeroExterior = $request->input('NumeroExterior');
            $Persona->EstadoCivil = $request->input('EstadoCivil');
            $Persona->Nacionalidad = $request->input('Nacionalidad');

            if ($request->hasFile('Foto')) {
                $rutaFoto = $request->file('Foto')->store('fotos', 'public');
                $Persona->Foto = $rutaFoto;
            } else {
                $Persona->Foto = null;
            }

            $Persona->save();

            // Objeto Usuario
            $Usuario = new User();
            $Usuario->name = $request->input('Nombre');
            $Usuario->email = $request->input('Correo');
            $Usuario->idGoogle = null;

            $Usuario->save();


            // Objeto Docente
            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->id;
            $idUsuario = $Usuario->id;

            $Docente = new Docente();
            $Docente->Carrera = $request->input('Carrera');
            $Docente->Estado = 'Activo';
            $Docente->FechaIngreso = today();
            $Docente->RFC = $request->input('RFC');
            $Docente->NoINE = $request->input('NoINE');
            $Docente->Sueldo = $request->input('Sueldo');
            $Docente->idUsuario = $idUsuario;
            $Docente->idPersona = $idPersona;

            $Docente->save();

            // Confirmar transacción
            DB::commit();

            return redirect()->view('director.ConsulAdmin')->with(
                'success',
                'Docente registrado con éxito.'
            );
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Docente: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        /* 
        Regresa una respuesta que se usara en la vista dinamica para mostrar los 
        datos de un alumno especifico(no se implementara por no ser nesesario
        porque ya se podran ver en la funcion edit)
        */
    }

    public function edit(VDocente $id)
    {
        //regresa la vista para la edicion 
        if (!$id) {
            return response()->json(['error' => 'Docente no encontrado'], 404);
        } else {
            return view('dinamicas.EditarDocente', ['Docente' => $id]);
        }
    }

    public function update(Request $request, string $id)
    {
        /* */
        $request->validate([
            'Nombre' => 'required|string',
            'ApellidoMaterno' => 'required|string',
            'ApellidoPaterno' => 'required|string',
            'Ciudad' => 'required|string',
            'Municipio' => 'required|string',
            'ColFrac' => 'required|string',
            'Calle' => 'required|string',
            'EstadoCivil' => 'required|string',
            'Nacionalidad' => 'required|string',
            'Correo' => 'required|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        DB::beginTransaction();

        try {
            // Buscar al docente por su ID
            $Persona = Persona::findOrFail($id);

            $Persona->Nombre = $request->input('Nombre');
            $Persona->ApellidoMaterno = $request->input('ApellidoMaterno');
            $Persona->ApellidoPaterno = $request->input('ApellidoPaterno');
            $Persona->CURP = $request->input('CURP');
            $Persona->FechaNacimiento = $request->input('FechaNacimiento');
            $Persona->Genero = $request->input('Genero');
            $Persona->Ciudad = $request->input('Ciudad');
            $Persona->Municipio = $request->input('Municipio');
            $Persona->CodigoPostal = $request->input('CodigoPostal');
            $Persona->ColFrac = $request->input('ColFrac');
            $Persona->Calle = $request->input('Calle');
            $Persona->NumeroExterior = $request->input('NumeroExterior');
            $Persona->EstadoCivil = $request->input('EstadoCivil');
            $Persona->Nacionalidad = $request->input('Nacionalidad');

            $Persona->save();

            $Docente = new Docente();

            $Docente->Carrera = $request->input('Carrera');
            $Docente->Estado = 'Activo';
            $Docente->FechaIngreso = today();
            $Docente->RFC = $request->input('RFC');
            $Docente->NoINE = $request->input('NoINE');
            $Docente->Sueldo = $request->input('Sueldo');

            $Docente->Save();

            // Retornar una respuesta indicando éxito
            return redirect()->view('director.ConsulAdmin')->with(
                'success',
                'Docente actualizado con éxito.'
            );
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Docente: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        /*
        Borra registros de un docente (no se implementara esta funcion por seguridad de los datos)
        */
    }
}