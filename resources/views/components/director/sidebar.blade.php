<!-- Sidebar -->
<div x-data="{ collapsed: false }" :class="collapsed ? 'w-20' : 'w-64'"
    class=" sidebar bg-gray-900 h-screen p-4 fixed top-0 left-0 z-70 overflow-y-auto transition-all duration-500 ease-in-out">

    <p>" "</p>

    <p>&nbsp;</p>





    <!-- Opción Home -->
    <a href="{{ route('MenuDirector') }}"
        class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 transition-all duration-200">
        <div class="flex items-center justify-center" style="font-size: 20px;">
            <span x-show="!collapsed" class="transition-all duration-200">INICIO</span>
        </div>

    </a>




    <!-- Submenu Registros Financieros -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-file-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Registros Financieros</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="{{ route('VistaRegistrarPago') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Pago/Ingreso</a>
            <a href="{{ route('VistaRegistrarDescuento') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Descuento</a>
            <a href="{{ route('VistaRegistrarConcepto') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Concepto</a>
            <a href="{{ route('VistaRegistrarCompra') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Compra/Gasto</a>
            <a href="{{ route('VistaRegistrarVenta') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Venta</a>
            <a href="{{ route('ListaPeriodos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Periodo</a>
        </div>
    </div>


    <!-- Submenu  Registros Academicos -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-globe-americas text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Registros Academicos</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="{{ route('VistaRegistrarAlumno') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Alumno</a>
            <a href="{{ route('VistaRegistrarTutor') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Tutor</a>
            <a href="{{ route('VistaRegistrarDocente') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Docente</a>
            <a href="{{ route('VistaRegistrarCoordi') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Coordinador</a>
            <a href="{{ route('VistaRegistrarAdmin') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Administrador</a>
            <a href="{{ route('VistaRegistrarMateria') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Materia</a>
            <a href="{{ route('VistaRegistrarGrupo') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Grupo</a>
            <a href="{{ route('VistaRegistrarAula') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Aula</a>


        </div>
    </div>


    <!-- Submenu Registros Inventario -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-pencil-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200"> Registros Inventario</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="" class="block text-black py-1 px-2 rounded hover:bg-gray-200">#</a>
            <a href="" class="block text-black py-1 px-2 rounded hover:bg-gray-200">#</a>



        </div>
    </div>


    <!-- Submenu Consultas Academicas -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-chalkboard text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Consultas Academicas</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="{{ route('ListaAlumnos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Alumnos</a>
            <a href="{{ route('ListaTutores') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Tutores</a>
            <a href="{{ route('ListaGrupos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Grupos</a>
            <a href="{{ route('ListaDocentes') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Docentes</a>
            <a href="{{ route('ListaCoordinadores') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Coordinadores</a>
            <a href="{{ route('ListaAdmin') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Administradores</a>
            <a href="{{ route('ListaVestimentas') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Uniforme</a>


        </div>
    </div>


    <!-- Submenu  Consultas Financieras -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-search text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Consultas Financieras</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="{{ route('ListaColegiaturas') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Colegiaturas</a>
            <a href="{{ route('ListaColegiaturasFaltantes') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Colegiaturas Pendientes</a>
            <a href="{{ route('ListaPagos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Pagos/Ingresos</a>
            <a href="{{ route('ListaCompras') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Compras</a>
            <a href="{{ route('ListaVentas') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Ventas/Ingresos</a>




        </div>
    </div>




    <!-- Submenu  Consultas Inventarios -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-chalkboard text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Consultas Inventarios</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="" class="block text-black py-1 px-2 rounded hover:bg-gray-200">#</a>
            <a href="" class="block text-black py-1 px-2 rounded hover:bg-gray-200">#</a>





        </div>
    </div>


    <!-- Submenu Asignaciones Academicas -->
    <div x-data="{ open: false, showIcon: true }">
        <a href="#" @click="open = !open; showIcon = !showIcon"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i x-show="showIcon" class="fas fa-user-graduate text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">Asignaciones Academicas</span>
        </a>

        <div x-show="open" class="pl-6">
            <a href="{{ route('ListaTutoresAlumnos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Tutores-Alumnos</a>
            <a href="{{ route('VistaAsignarContacto') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Contactos</a>
            <a href="{{ route('ListaGruposAlumnos') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Grupo-Alumnos</a>
            <a href="{{ route('ListaGruposDocentes') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Grupo-Docente</a>
            <a href="{{ route('ListaGruposMaterias') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Grupo-Materia</a>
            <a href="{{ route('ListaHorarios') }}"
                class="block text-black py-1 px-2 rounded hover:bg-gray-200">Horarios</a>

        </div>
    </div>


   <!-- Botón para colapsar/expandir -->
<button @click="collapsed = !collapsed"
    style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); width: 56px; height: 56px; background: linear-gradient(145deg, #1E3A8A, #3B82F6); color: #FFFFFF; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3), -4px -4px 8px rgba(255, 255, 255, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease; cursor: pointer; overflow: hidden;">
    <svg :class="collapsed ? 'rotate-180' : 'rotate-0'" style="width: 24px; height: 24px; transition: transform 0.3s ease;"
        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
</button>

<script>
    function handleHoverIn(event) {
        event.target.style.background = "linear-gradient(145deg, #2563EB, #60A5FA)";
        event.target.style.boxShadow =
            "6px 6px 12px rgba(0, 0, 0, 0.4), -6px -6px 12px rgba(255, 255, 255, 0.15)";
    }

    function handleHoverOut(event) {
        event.target.style.background = "linear-gradient(145deg, #1E3A8A, #3B82F6)";
        event.target.style.boxShadow =
            "4px 4px 8px rgba(0, 0, 0, 0.3), -4px -4px 8px rgba(255, 255, 255, 0.1)";
    }
</script>






</div>
