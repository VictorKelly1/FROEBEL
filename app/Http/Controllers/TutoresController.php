<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Tutor;
use App\Models\VAlumno;
use App\Models\VTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutoresController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los Tutores
        */
        $Tutores = VTutor::all();
        return view('director.ConsultasTutores', ['Tutores' => $Tutores]);
    }


    public function create()
    {
        /*
        Regresa la vista para registrar un tutor con los una lista de alunnos para seleccionar
        a cual sera tutoreado
        */
        $Alumnos = VAlumno::all();
        return view('director.RegisTutor', ['Alumnos' => $Alumnos]);
    }

    public function store(Request $request)
    {
        /* 
        Funcion para registrar un Administrador en la base de datos guardando los datos en las respectivas
        tablas y asignandole un correo al momento de su creacion para que tenga acceso al sistema
        */

        //Validacion del request -existen
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

        //Integridad -filtro de correcion de sintaxis(en el modelo)           
        //Verificacion -requerimientos (en el modelo) 


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
                $rutaFoto = $request->file('Foto')->move(public_path('fotos'), $request->file('Foto')->getClientOriginalName());
                $Persona->Foto = $rutaFoto;
            } else {
                $Persona->Foto = null;
            }

            $Persona->save();

            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->idPersona;


            $Tutor = new Tutor();

            $Tutor->RFC = $request->input('RFC');
            $Tutor->NoINE = $request->input('NoINE');
            $Tutor->LugarTrabajo = $request->input('LugarTrabajo');
            $Tutor->idPersona = $idPersona;

            $Tutor->save();

            // Confirmar transacción
            DB::commit();

            $Alumnos = VAlumno::all();
            $Tutores = VTutor::all();
            return view(
                'director.AsigAlumTutor',
                [
                    'Alumnos' => $Alumnos,
                    'Tutores' => $Tutores,
                ]
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

    public function edit(VTutor $id)
    {
        /*
        Regresa la vista dinamica para editar un Tutor 
        */

        // Verificar si se encontró el Tutor
        if (!$id) {
            return response()->json(['error' => 'Tutor no encontrado'], 404);
        } else {
            return view('dinamicas.EditarTutor', ['Tutor' => $id]);
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
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

        ]);

        DB::beginTransaction();

        try {
            // Buscar al alumno por su ID
            $idT = $request->input('id');

            $Tutor = Tutor::where('idTutor', $idT)->firstOrFail();

            $Tutor->RFC = $request->input('RFC');
            $Tutor->NoINE = $request->input('NoINE');
            $Tutor->Sueldo = $request->input('LugarTrabajo');

            $Tutor->save();

            $idPersona = $Tutor->idPersona;

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
            return redirect()->route('ListaTutores')->with('success', 'Administrador actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Tutor: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        /*
        Borra registros de un alumno (no se implementara esta funcion por seguridad de los datos)
        */
    }
}
