<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coordinador;
use App\Models\Persona;
use App\Models\User;
use App\Models\VCoordinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoordinadoresController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los alumnos activos
        */
        $Coordinador = VCoordinador::where('Estado', 'Activo')->get();
        return response()->json($Coordinador);
    }

    public function create()
    {
        //
        return view('director.RegisCoordi');
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


            // Objeto Coordinador
            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->id;
            $idUsuario = $Usuario->id;

            $Coordinador = new Coordinador();
            $Coordinador->Estado = 'Activo';
            $Coordinador->RFC = $request->input('RFC');
            $Coordinador->NoINE = $request->input('NoINE');
            $Coordinador->Sueldo = $request->input('Sueldo');
            $Coordinador->idUsuario = $idUsuario;
            $Coordinador->idPersona = $idPersona;

            $Coordinador->save();

            // Confirmar transacción
            DB::commit();

            return redirect()->route('ListaCoordi')->with('success', 'Coordinador registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Coordinador: ' . $e->getMessage());
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


    public function edit(VCoordinador $id)
    {
        //regresa la vista para editar 
        if (!$id) {
            return response()->json(['error' => 'Coordinador no encontrado'], 404);
        } else {
            return view('dinamicas.EditarCoordinador', ['Coordinador' => $id]);
        }
    }

    public function update(Request $request)
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
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

        ]);

        DB::beginTransaction();

        try {
            // Buscar al alumno por su ID
            $idC = $request->input('id');

            $Coordinador = Coordinador::where('idCoordinador', $idC)->firstOrFail();

            $Coordinador->Estado = 'Activo';
            $Coordinador->RFC = $request->input('RFC');
            $Coordinador->NoINE = $request->input('NoINE');
            $Coordinador->Sueldo = $request->input('Sueldo');

            $Coordinador->Save();

            $idPersona = $Coordinador->idPersona;

            Persona::where('idPersona', $idPersona)
                ->update([
                    'Nombre' => $request->input('Nombre'),
                    'ApellidoMaterno' => $request->input('ApellidoMaterno'),
                    'ApellidoPaterno' => $request->input('ApellidoPaterno'),
                    'CURP' => $request->input('CURP'),
                    'FechaNacimiento' => $request->input('FechaNacimiento'),
                    'Genero' => $request->input('Genero'),
                    'Ciudad' => $request->input('Ciudad'),
                    'Municipio' => $request->input('Municipio'),
                    'CodigoPostal' => $request->input('CodigoPostal'),
                    'ColFrac' => $request->input('ColFrac'),
                    'Calle' => $request->input('Calle'),
                    'NumeroExterior' => $request->input('NumeroExterior'),
                    'EstadoCivil' => $request->input('EstadoCivil'),
                    'Nacionalidad' => $request->input('Nacionalidad')
                ]);

            DB::commit();

            // Retornar una respuesta indicando éxito
            return redirect()->route('ListaCoordi')->with('success', 'Coordinador actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Coordinador: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        /*
        Borra registros de un docente (no se implementara esta funcion por seguridad de los datos)
        */
    }
}
