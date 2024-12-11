<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\Contacto;
use App\Models\Persona;
use App\Models\User;
use App\Models\VAdministrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los administradores activos
        */
        $Administradores = VAdministrador::where('Estado', 'Activo')->get();
        return view('director.ConsultasAlum', ['Administrador' => $Administradores]);
    }


    public function create()
    {
        /*
        Regresa la vista para registrar un alumno
        */
        return view('director.RegisAdmin');
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

            // Objeto Usuario
            $Usuario = new User();
            $Usuario->name = $request->input('Nombre');
            $Usuario->email = $request->input('Correo');
            $Usuario->idGoogle = null;

            $Usuario->save();

            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->idPersona;
            $idUsuario = $Usuario->id;

            $Administrador = new Administrador();
            $Administrador->Estado = 'Activo';
            $Administrador->RFC = $request->input('RFC');
            $Administrador->NoINE = $request->input('NoINE');
            $Administrador->Sueldo = $request->input('Sueldo');
            $Administrador->idUsuario = $idUsuario;
            $Administrador->idPersona = $idPersona;

            $Administrador->save();

            //Poner un contacto al alumno a partir del correo recien asignado
            $Contacto = new Contacto();

            $Contacto->TipoContacto = "Email";
            $Contacto->ValorContacto = $request->input('Correo');
            $Contacto->idReceptor = $idPersona;

            $Contacto->save();

            // Confirmar transacción
            DB::commit();

            return redirect()->route('ListaAdmin')->with('success', 'Administrador registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Administrador: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        /* 
        Regresa una respuesta que se usara en la vista dinamica para mostrar los 
        datos de un Administrador especifico(no se implementara por no ser nesesario
        porque ya se podran ver en la funcion edit)
        */
    }


    public function edit(VAdministrador $id)
    {
        /*
        Regresa la vista dinamica para editar un administrador 
        */

        // Verificar si se encontró el administrador
        if (!$id) {
            return response()->json(['error' => 'Administrador no encontrado'], 404);
        } else {
            return view('dinamicas.EditarAdmin', ['Administrador' => $id]);
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
            // Buscar por su ID
            $idAd = $request->input('id');

            $Administrador = Administrador::where('idAdministrador', $idAd)->firstOrFail();

            $Administrador->Estado = 'Activo';
            $Administrador->RFC = $request->input('RFC');
            $Administrador->NoINE = $request->input('NoINE');
            $Administrador->Sueldo = $request->input('Sueldo');

            $Administrador->Save();

            $idPersona = $Administrador->idPersona;

            $Persona = Persona::findOrFail($idPersona);

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

            //
            DB::commit();

            // Retornar una respuesta indicando éxito
            return redirect()->route('ListaAdmin')->with('success', 'Administrador actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al actualizar el Administrador: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
