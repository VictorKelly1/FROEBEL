<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//Modelos
use App\Models\Persona;
use App\Models\Alumno;
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
        $Alumnos = VAlumno::where('Estado', 'activo')->get();
        return response()->json($Alumnos);
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
            'Nombre' => 'required|string|max:50',
            'ApellidoMaterno' => 'required|string|max:50',
            'ApellidoPaterno' => 'required|string|max:50',
            'Ciudad' => 'required|string|max:50',
            'Municipio' => 'required|string|max:50',
            'ColFrac' => 'required|string|max:50',
            'Calle' => 'required|string|max:50',
            'EstadoCivil' => 'required|string|max:50',
            'Nacionalidad' => 'required|string|max:50',
            'Correo' => 'required|email|max:255|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'Matricula' => 'required|string|max:50|unique:alumnos,Matricula',
            'Estado' => 'required|in:Suspendido,Baja,Activo',
            'FechaIngreso' => 'required|date|before_or_equal:today',
            'EscuelaProcede' => 'required|string|max:100',
        ]);

        //Integridad -filtro de correcion de sintaxis(en el modelo)
        //Verificacion -requerimientos (en el modelo) 

        //Objeto persona
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

        //Validacion/Integridad
        if ($request->hasFile('Foto')) {
            // Sube el archivo y obtiene la ruta
            $rutaFoto = $request->file('Foto')->store('fotos', 'public');
            $Persona->Foto = $rutaFoto;
        } else {
            // En caso de que no se proporcione una foto
            $Persona->Foto = null;
        }
        $Persona->Save();

        //Objeto Usuario
        $Usuario = new User();
        $Usuario->name = $request('Nombre');
        $Usuario->email = $request('Correo');
        $Usuario->idGoogle = null; //google lo actualizara al valor requerido momento de iniciar sesion con SSO 
        $Usuario->Save();

        //Objeto Alumno
        //se obtiene la id de la persona donde esta su CURP(Valor unico de persona)
        $idPersona = Persona::where('CURP', $request->input('CURP'))->value('idPersona');
        //se obtiene la id del usuario donde esta el correo ingresado(valor unico de usuario)
        $idUsuario = User::where('email', $request->input('Correo'))->value('id');

        $Alumno = new Alumno();
        $Alumno->Matricula = $request->input('Matricula');
        $Alumno->Estado = $request->input('EstadoActividad');
        $Alumno->FechaIngreso = today(); // (Y-m-d)
        $Alumno->EscuelaProcede = $request->input('EscuelaProcede');
        $Alumno->idUsuario = $idUsuario;
        $Alumno->idPersona = $idPersona;
        $Alumno->Save();

        //Respuesta
        return response()->json(['message' => 'Alumno registrado correctamente!']);
    }


    public function show(VAlumno $id)
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

        $Alumno = DB::table('vAlumnos')
            ->where('idAlumno', $id)
            ->first();

        // Verificar si se encontró el alumno
        if (!$Alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        } else {
            return response()->json($Alumno);
        }
    }


    public function update(Request $request, string $id)
    {
        /*
        Actualiza los datos de un alumno especifico
        */

        //Validacion del request -Existen
        $request->validate([
            'Nombre' => 'required|string|max:50',
            'ApellidoMaterno' => 'required|string|max:50',
            'ApellidoPaterno' => 'required|string|max:50',
            'Ciudad' => 'required|string|max:50',
            'Municipio' => 'required|string|max:50',
            'ColFrac' => 'required|string|max:50',
            'Calle' => 'required|string|max:50',
            'EstadoCivil' => 'required|string|max:50',
            'Nacionalidad' => 'required|string|max:50',
            'Correo' => 'required|email|max:255|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'Matricula' => 'required|string|max:50|unique:alumnos,Matricula',
            'Estado' => 'required|in:Suspendido,Baja,Activo',
            'FechaIngreso' => 'required|date|before_or_equal:today',
            'EscuelaProcede' => 'required|string|max:100',
        ]);

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
        return response()->json([
            'message' => 'Datos del alumno actualizados correctamente!',
            'alumno' => $Alumno,
        ], 200);
    }


    public function destroy(string $id)
    {
        /*
        Borra registros de un alumno (no se implementara esta funcion por seguridad de los datos)
        */
    }
}
