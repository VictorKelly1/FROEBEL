<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//Modelos
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\User;
use App\Models\VAlumno;
//Librerias
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los alumnos activos
        */
        $Alumnos = VAlumno::where('Estado', 'Activo')->get();
        return view('director.ConsultasAlum', ['Alumnos' => $Alumnos]);
    }


    public function create()
    {
        /*
        Regresa la vista para registrar un alumno
        */
        return view('director.RegisAlum');
    }

    public function store(Request $request)
    {
        /* 
        Funcion para registrar un alumno en la base de datos guardando los datos en las respectivas
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
            'Matricula' => 'required|string',
            'EscuelaProcede' => 'required|string',
            'Correo' => 'required|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        /*   */

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

            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->id;
            $idUsuario = $Usuario->id;

            $Alumno = new Alumno();
            $Alumno->Matricula = $request->input('Matricula');
            $Alumno->Estado = 'Activo';
            $Alumno->FechaIngreso = today();
            $Alumno->EscuelaProcede = $request->input('EscuelaProcede');
            $Alumno->idUsuario = $idUsuario;
            $Alumno->idPersona = $idPersona;

            $Alumno->save();

            //Poner un contacto al alumno a partir del correo recien asignado
            $Contacto = new Contacto();

            $Contacto->TipoContacto = "Email";
            $Contacto->ValorContacto = $request->input('Correo');
            $Contacto->idReceptor = $idPersona;

            $Contacto->save();

            // Confirmar transacción
            DB::commit();

            return view('director.RegisTutor', ['Alumno' => $Alumno]);
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Alumno: ' . $e->getMessage());
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


    public function edit(VAlumno $id)
    {
        /*
        Regresa la vista dinamica para editar un alumno 
        */


        // Verificar si se encontró el alumno
        if (!$id) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        } else {
            return view('dinamicas.EditarAlumno', ['Alumno' => $id]);
        }
    }


    public function update(Request $request, string $id)
    {
        /*
        Actualiza los datos de un alumno especifico
        */

        //Validacion del request -Existen
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
            'FechaNacimiento' => 'required',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'FechaIngreso' => 'required|before_or_equal:today',
            'EscuelaProcede' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            // Buscar al alumno por su ID
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

            $Alumno = new Alumno();

            $Alumno->Matricula = $request->input('Matricula');
            $Alumno->Estado = $request->input('EstadoActividad');
            $Alumno->FechaIngreso = $request->input('Fecha');
            $Alumno->EscuelaProcede = $request->input('EscuelaProcede');

            $Alumno->Save();

            // Retornar una respuesta indicando éxito
            return redirect()->view('director.ConsultasAlum')->with('success', 'Alumno registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al actualizar el Alumno: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        /*
        Borra registros de un alumno (no se implementara esta funcion por seguridad de los datos)
        */
    }
}
