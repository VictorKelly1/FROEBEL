<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnosRelacionesController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\ColegiaturasController;
use App\Http\Controllers\ComprasControllers;
use App\Http\Controllers\ComunicadosController;
use App\Http\Controllers\ConceptosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CoordinadoresController;
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\FijosController;
use App\Http\Controllers\GruposAlumnoController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\GruposDocenteController;
use App\Http\Controllers\GruposMatController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\InasistenciasController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ModuloAlumnoController;
use App\Http\Controllers\ModuloDocenteController;
use App\Http\Controllers\NominasController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PlaneacionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetardosController;
use App\Http\Controllers\SSO;
use App\Http\Controllers\TutoresController;
use App\Http\Controllers\VentasControllers;
use App\Http\Controllers\VestimentaController;
use App\Models\VdescTransacciones;
use Illuminate\Support\Facades\Route;
//

//Rutas SSO Google
Route::controller(SSO::class)->group(function () {
    Route::get('/google_auth/redirect', 'redirect')->name('redirect');
    Route::get('/google_auth/callback', 'callback')->name('callback');
});


//ruta para Preubas
Route::view('/', 'welcome')->name('log');

//------------------------------------------------------------------------------------------------------------

//Rutas con los controladores del alumno
Route::middleware('DirectorPermisos')->group(function () {
    Route::get('/Alumnos', [AlumnoController::class, 'index'])->name('ListaAlumnos');
    Route::get('/VistaRegistrarAlumno', [AlumnoController::class, 'create'])->name('VistaRegistrarAlumno');
    Route::post('/RegistrarAlumno', [AlumnoController::class, 'store'])->name('RegistrarAlumno');
    Route::get('/VistaEditarAlumno/{id}', [AlumnoController::class, 'edit'])->name('VistaEditarAlumno');
    Route::post('/EditarAlumno', [AlumnoController::class, 'update'])->name('EditarAlumno');
});


//Rutas con los controladores de Docentes
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(DocenteController::class)->group(function () {
        Route::get('/Docentes', 'index')->name('ListaDocentes');
        Route::get('/VistaRegistrarDocente', 'create')->name('VistaRegistrarDocente');
        Route::post('/RegistrarDocente', 'store')->name('RegistrarDocente');
        Route::get('/VistaEditarDocente/{id}', 'edit')->name('VistaEditarDocente');
        Route::post('/EditarDocente', 'update')->name('EditarDocente');
    });
});


//Rutas con los controladores de tutores
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(TutoresController::class)->group(function () {
        Route::get('/Tutores', 'index')->name('ListaTutores');
        Route::get('/VistaRegistrarTutor', 'create')->name('VistaRegistrarTutor');
        Route::post('/RegistrarTutor', 'store')->name('RegistrarTutor');
        Route::get('/VistaEditarTutor/{id}', 'edit')->name('VistaEditarTutor');
        Route::post('/EditarTutor', 'update')->name('EditarTutor');
    });
});


//Rutas con los controladores de coordinadores
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(CoordinadoresController::class)->group(function () {
        Route::get('/Coordinadores', 'index')->name('ListaCoordinadores');
        Route::get('/VistaRegistrarCoordi', 'create')->name('VistaRegistrarCoordi');
        Route::post('/RegistrarCoordi', 'store')->name('RegistrarCoordi');
        Route::get('/VistaEditarCoordi/{id}', 'edit')->name('VistaEditarCoordi');
        Route::post('/EditarCoordi', 'update')->name('EditarCoordi');
    });
});


//Rutas con los controladores de administradores
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(AdministradorController::class)->group(function () {
        Route::get('/Admin', 'index')->name('ListaAdmin');
        Route::get('/VistaRegistrarAdmin', 'create')->name('VistaRegistrarAdmin');
        Route::post('/RegistrarAdmin', 'store')->name('RegistrarAdmin');
        Route::get('/VistaEditarAdmin/{id}', 'edit')->name('VistaEditarAdmin');
        Route::post('/EditarAdmin', 'update')->name('EditarAdmin');
    });
});


//------------------------------------------------------------------------------------------------------------

//Rutas con los controladores de articulos fijos
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(FijosController::class)->group(function () {
        Route::get('/Fijos', 'index')->name('ListaFijos');
        Route::get('/VistaRegistrarFijo', 'create')->name('VistaRegistraFijo');
        Route::post('/RegistrarFijo', 'store')->name('RegistrarFijo');
        Route::get('/VistaEditarFijo/{id}', 'edit')->name('VistaEditarFijo');
        Route::post('/EditarFijo', 'update')->name('EditarFijo');
    });
});


//------------------------------------------------------------------------------------------------------------
//Rutas con los controladores conceptos
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(ConceptosController::class)->group(function () {
        Route::get('/Conceptos', 'index')->name('ListaConceptos');
        Route::get('/VistaRegistrarConcepto', 'create')->name('VistaRegistrarConcepto');
        Route::post('/RegistrarConceptos', 'store')->name('RegistrarConceptos');
        Route::get('/VistaEditarConceptos/{id}', 'edit')->name('VistaEditarConceptos');
        Route::post('/EditarConcepto', 'update')->name('EditarConcepto');
    });
});


//Rutas con los controladores de descuentos
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(DescuentosController::class)->group(function () {
        Route::get('/Descuentos', 'index')->name('ListaDescuentos');
        Route::get('/VistaRegistrarDescuento', 'create')->name('VistaRegistrarDescuento');
        Route::post('/RegistrarDescuento', 'store')->name('RegistrarDescuento');
        Route::get('/VistaEditarDescuento/{id}', 'edit')->name('VistaEditarDescuento');
        Route::post('/EditarDescuento', 'update')->name('EditarDescuento');
    });
});


//------------------------------------------------------------------------------------------------------------

//Rutas con los controladores de grupos
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(GruposController::class)->group(function () {
        Route::get('/Grupos', 'index')->name('ListaGrupos');
        Route::get('/VistaRegistrarGrupo', 'create')->name('VistaRegistrarGrupo');
        Route::post('/RegistrarGrupo', 'store')->name('RegistrarGrupo');
        Route::get('/VistaEditarGrupo/{id}', 'edit')->name('VistaEditarGrupo');
        Route::post('/EditarGrupo', 'update')->name('EditarGrupo');
    });
});


//Rutas con los controladores de Materias
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(MateriasController::class)->group(function () {
        Route::get('/Materias', 'index')->name('ListaMaterias');
        Route::get('/VistaRegistrarMateria', 'create')->name('VistaRegistrarMateria');
        Route::post('/RegistrarMateria', 'store')->name('RegistrarMateria');
        Route::get('/VistaEditarMateria/{id}', 'edit')->name('VistaEditarMateria');
        Route::post('/EditarMateria/{id}', 'update')->name('EditarMateria');
    });
});


//Rutas con los controladores de materiales
Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(MaterialesController::class)->group(function () {
        Route::get('/Materiales', 'index')->name('ListaMateriales');
        Route::get('/VistaRegistrarMaterial', 'create')->name('VistaRegistrarMaterial');
        Route::post('/RegistrarMaterial', 'store')->name('RegistrarMaterial');
        Route::get('/VistaEditarMaterial/{id}', 'edit')->name('VistaEditarMaterial');
        Route::post('/EditarMaterial/{id}', 'update')->name('EditarMaterial');
        Route::get('/Material/{id}', 'destroy')->name('EliminarMaterial');
    });
});


//------------------------------------------------------------------------------------------------------------

Route::middleware('DirectorPermisos')->group(function () {
    Route::controller(GruposAlumnoController::class)->group(function () {
        Route::get('/GruposAlumnos', 'index')->name('ListaGruposAlumnos');
        Route::post('/AsignarGrupAlum', 'store')->name('AsignarGrupAlum');
        Route::get('/GruposAlumnos/{GA}', 'destroy')->name('EliminarGrupAlum');
    });

    Route::controller(GruposDocenteController::class)->group(function () {
        Route::get('/GruposDocentes', 'index')->name('ListaGruposDocentes');
        Route::post('/AsignarGrupDocente', 'store')->name('AsignarGrupDocente');
        Route::get('/GruposDocente/{GD}', 'destroy')->name('EliminarGrupDocente');
    });

    Route::controller(GruposMatController::class)->group(function () {
        Route::get('/GruposMaterias', 'index')->name('ListaGruposMaterias');
        Route::post('/AsignarGrupMateria', 'store')->name('AsignarGrupMateria');
        Route::get('/GruposMateria/{GM}', 'destroy')->name('EliminarGrupMateria');
    });

    Route::controller(AlumnosRelacionesController::class)->group(function () {
        Route::get('/TutoresAlumnos', 'index')->name('ListaTutoresAlumnos');
        Route::post('/AsignarTutorAlum', 'store')->name('AsignarTutoresAlum');
        Route::get('/TutoresAlumnos/{TA}', 'destroy')->name('EliminarTutoresAlum');
    });

    Route::controller(HorariosController::class)->group(function () {
        Route::get('/Horarios', 'index')->name('ListaHorarios');
        Route::post('/AsignarHorario', 'store')->name('AsignarHorario');
        Route::get('/Horario/{H}', 'destroy')->name('EliminarHorario');
    });

    Route::controller(AulasController::class)->group(function () {
        Route::get('/Aulas', 'index')->name('ListaAulas');
        Route::get('/VistaRegistrarAula', 'create')->name('VistaRegistrarAula');
        Route::post('/RegistrarAula', 'store')->name('RegistrarAula');
        Route::get('/VistaEditarAula/{id}', 'edit')->name('VistaEditarAula');
        Route::post('/EditarAula', 'update')->name('EditarAula');
    });



    //------------------------------------------------------------------------------------------------------------

    //Rutas con los controladores de calificaciones
    Route::controller(CalificacionesController::class)->group(function () {
        Route::get('/CalificacionAlumno/{CA}', 'show')->name('MostrarCalificacionesAlum');
    });

    //------------------------------------------------------------------------------------------------------------

    Route::controller(ColegiaturasController::class)->group(function () {
        Route::get('/Colegiaturas', 'index')->name('ListaColegiaturas');
        Route::get('/VistaRegistrarColegiatura/{id}', 'create')->name('VistaRegistrarColegiatura');
        Route::post('/RegistrarColegiatura', 'store')->name('RegistrarColegiatura');
        Route::get('/ColegiaturaImprimirRecibo/{id}', 'show')->name('ColegiaturaImprimirRecibo');
        //
        Route::get('/ListaColegiaturasFaltantes', function () {

            $Faltantes = VdescTransacciones::where('TipoTransaccion', 'X')
                ->paginate(0);
            return view('director.Colegfaltantes', ['Faltantes' => $Faltantes]);
        })->name('ListaColegiaturasFaltantes');
        //
        Route::post('/BuscarColegiaturaFaltante', 'FaltantesPagos')->name('BuscarColegiaturaFaltante');
    });

    Route::controller(PagosController::class)->group(function () {
        Route::get('/PagosDeAlumno', 'index')->name('ListaPagos');
        Route::get('/VistaRegistrarPago', 'create')->name('VistaRegistrarPago');
        Route::post('/RegistrarPago', 'store')->name('RegistrarPago');
        Route::get('/PagoImprimirRecibo/{id}', 'show')->name('PagoImprimirRecibo');
    });

    //----------

    Route::controller(VentasControllers::class)->group(function () {
        Route::get('/Ventas', 'index')->name('ListaVentas');
        Route::get('/VistaRegistrarVenta', 'create')->name('VistaRegistrarVenta');
        Route::post('/RegistrarVenta', 'store')->name('RegistrarVenta');
        Route::get('/VentaImprimirRecibo/{id}', 'show')->name('VentaImprimirRecibo');
    });

    //----------

    Route::controller(ComprasControllers::class)->group(function () {
        Route::get('/Compras', 'index')->name('ListaCompras');
        Route::get('/VistaRegistrarCompra', 'create')->name('VistaRegistrarCompra');
        Route::post('/RegistrarCompra', 'store')->name('RegistrarCompra');
        Route::get('/CompraImprimirRecibo/{id}', 'show')->name('CompraImprimirRecibo');
    });

    //----------

    Route::controller(NominasController::class)->group(function () {
        Route::get('/Nominas', 'index')->name('ListaNominas');
    });

    //------------------------------------------------------------------------------------------------------------

    Route::controller(ContactosController::class)->group(function () {
        Route::get('/VistaAsignarContacto', 'index')->name('VistaAsignarContacto');
        Route::post('/AsignarContacto', 'store')->name('AsignarContacto');
    });

    Route::controller(ComunicadosController::class)->group(function () {
        Route::get('/Comunicados', 'index')->name('ListaComunicados');
        Route::get('/Comunicados/{IDs}', 'EnviarComunicado')->name('ListaComunicados');

        Route::get('/VistaComunicadoPersonal/{id}', 'show')->name('VistaComunicadoPersonal');
        Route::post('/ComunicadoPersonal', 'ComunicadoPerso')->name('ComunicadoPersonal');
    });

    //----------

    Route::controller(InasistenciasController::class)->group(function () {
        Route::get('/Inasistencias', 'index')->name('ListaInasistencias');
    });

    Route::controller(RetardosController::class)->group(function () {
        Route::get('/Retardos', 'index')->name('ListaRetardos');
    });

    Route::controller(RetardosController::class)->group(function () {
        Route::get('/Retardos', 'index')->name('ListaRetardos');
    });

    Route::controller(VestimentaController::class)->group(function () {
        Route::get('/Vestimentas', 'index')->name('ListaVestimentas');
    });

    Route::controller(PlaneacionesController::class)->group(function () {
        Route::get('/Planeaciones', 'index')->name('ListaPlaneaciones');
    });
    //------------------------Menu director
    Route::get('/MenuDirector', function () {
        return view('director.Menu');
    })->name('MenuDirector');
    //------------------------Administracion de bajas
    Route::get('/AdministracionBajas', [Controller::class, 'bajas'])->name('AdministracionBajas');
});
//------------------------------------------------------------------------------------------------------------

Route::middleware('AlumnoPermisos')->group(function () {
    Route::get('/MiMenu', [ModuloAlumnoController::class, 'index'])->name('MenuAlumno');
    Route::get('/MisCalificaciones', [ModuloAlumnoController::class, 'calificaciones'])->name('MisCalificaciones');
    Route::get('/MiHorario', [ModuloAlumnoController::class, 'horario'])->name('MiHorario');
    Route::get('/MisInasistencias', [ModuloAlumnoController::class, 'inasistencias'])->name('MisInasistencias');
    Route::get('/MisColegiaturas', [ModuloAlumnoController::class, 'vistaColegiaturas'])->name('MisColegiaturas');
    Route::post('/PagarColegiatura', [ModuloAlumnoController::class, 'pagoColegiatura'])->name('PagarColegiatura');
    Route::get('/guardarColegiatura', [ModuloAlumnoController::class, 'guardarColegiatura'])->name('guardarColegiatura');
    //
    Route::get('/success', [ModuloAlumnoController::class, 'guardarColegiatura'])->name('GuardarColegiaturas');
    Route::get('/cancel', function () {
        return view('alumno.Colegiaturas'); // Mostrar vista de cancelación
    });
});

//------------------------------------------------------------------------------------------------------------

Route::middleware('DocentePermisos')->group(function () {
    Route::get('/MenuDocente', [ModuloDocenteController::class, 'index'])->name('MenuDocente');
    Route::get('/MisHorarios', [ModuloDocenteController::class, 'vistaHorario'])->name('MisHorarios');
    Route::get('/InasistenciasDocente', [ModuloDocenteController::class, 'vistaInasistencias'])->name('InasistenciasDocente');
    Route::get('/VistaRegistrarCalificacion', [ModuloDocenteController::class, 'vistaCalificacion'])->name('VistaRegistrarCalificacion');
    Route::post('/RegistrarCalificacion/{id}', [ModuloDocenteController::class, 'registrarCalificacion'])->name('RegistrarCalificacion');
    Route::post('/listaRegistrarInasistencia', [ModuloDocenteController::class, 'listaRegistrarInasistencia'])->name('listaRegistrarInasistencia');
});

//------------------------------------------------------------------------------------------------------------



//registrar nominas, calificaciones y eventos 
//modulo docente
/*hiatorial calificaciones*/

//impresion de recivos, constancias, calificaciones



//------------------------------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//patrones de diseño -Observador -Fachada -Estrategia
//Middlewares
//patrones de resiliencia
//procesos en segundo plano
//envio de emails
//Integracion de APIs 