<!-- Sidebar -->
<div x-data="{ collapsed: false }" 
     :class="collapsed ? 'w-20' : 'w-64'" 
     class=" sidebar bg-gray-900 h-screen p-4 fixed top-0 left-0 z-70 overflow-y-auto transition-all duration-500 ease-in-out">

     <p>" "</p>
    <p>" "</p>
    <p>" "</p>

    <div class="relative tamañobuscadorsidebar" x-show="!collapsed">
            <input
                type="text"
                class="bg-white text-gray-900 rounded-full px-4 py-1 text-sm"
                placeholder="Buscar...">
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-search" ></i>
            </button>
        </div>


    
    <!-- Opción Home -->
    <a href="#" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 transition-all duration-200">
    <div class="flex items-center justify-center"  style="font-size: 20px;">
    <span x-show="!collapsed" class="transition-all duration-200">INICIO</span>
</div>

    </a>

    <!-- Submenu Registros Financieros -->
    <div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
             <div class="flex items-center justify-center text-center">
             <i class="fa fa-industry" style="font-size: 35px;" aria-hidden="true"></i>
            <span x-show="!collapsed" class="transition-all duration-200"> Registros Financieros</span>
            </div>
            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div x-show="open && !collapsed" class="pl-6 text-center">
            <a href="{{ route('VistaRegistrarPago') }}" class="block text-black py-1 px-2 rounded hover:bg-gray-200">Pagos</a>
            <a href="{{ route('VistaRegistrarDescuento') }}" class="block text-black py-1 px-2 rounded hover:bg-gray-200">Descuento</a>
            <a href="{{ route('VistaRegistrarConcepto') }}" class="block text-black py-1 px-2 rounded hover:bg-gray-200">Concepto</a>
            <a href="{{ route('VistaRegistrarCompra') }}" class="block text-black py-1 px-2 rounded hover:bg-gray-200">Compra</a>
        </div>
    </div>

<!-- Submenu  Registros Academicos -->
<div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
             <div class="flex items-center justify-center text-center">
             <i class="fa fa-address-card"  style="font-size: 35px;"></i>
            <span x-show="!collapsed" class="transition-all duration-200">Registros Academicos</span>
            </div>
            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </div>
        <div x-show="open" class="pl-6 text-center">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarAlumno') }}">Alumno</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarTutor') }}">Tutor</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarMateria') }}">Materia</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarGrupo') }}">Grupo</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarDocente') }}">Docente</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarCoordi') }}">Coordinador</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarAula') }}">Aula</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('VistaRegistrarAdmin') }}">Administrador</a>

        </div>
    </div>


 <!-- Submenu Registros Inventario -->
 <div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
             <div class="flex items-center justify-center text-center">
             <i class="fa fa-shopping-bag" style="font-size: 35px;" aria-hidden="true"></i>

            <span x-show="!collapsed" class="transition-all duration-200">  Registros Inventario  </span>
            </div>
            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div x-show="open" class="pl-6 text-center">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>



        </div>
    </div>



   <!-- Submenu Consultas Academicas -->
 <div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
             <div class="flex items-center justify-center text-center">
             <i class="fa fa-book"  style="font-size: 35px;"  aria-hidden="true"></i>
            <span x-show="!collapsed" class="transition-all duration-200">Consultas Academicas</span>
            </div>
            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div x-show="open" class="pl-6 text-center">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaVestimentas') }}">Uniforme</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaAlumnos') }}">Alumnos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaTutores') }}">Tutores</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaGrupos') }}">Grupos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaDocentes') }}">Docentes</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaCoordinadores') }}">Coordinadores</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaAdmin') }}">Administradores</a>

        </div>
    </div>






<!-- Submenu  Consultas Financieras -->
<div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
             <div class="flex items-center justify-center text-center">
             <i class="fa fa-university" aria-hidden="true"  style="font-size: 35px;"></i>
            <span x-show="!collapsed" class="transition-all duration-200">Consultas Financieras</span>
            </div>
            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </div>
        <div x-show="open" class="pl-6 text-center">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaColegiaturas') }}">Colegiaturas</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaColegiaturasFaltantes') }}">Colegiaturas Pendientes</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaPagos') }}">Pagos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaCompras') }}">Compras</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaVentas') }}">Ventas</a>

        </div>
    </div>



<!-- Submenu  Consultas Inventarios -->
<div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
         <div class="flex items-center justify-center text-center">
         <i class="fa fa-archive"  style="font-size: 35px;" aria-hidden="true"></i>
            <span x-show="!collapsed" class="transition-all duration-200">Consultas Inventarios</span>
        </div>

            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </div>
        <div x-show="open" class="pl-6 text-center">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">#</a>

        </div>
    </div>



<!-- Submenu  Asignaciones Academicas -->
<div x-data="{ open: false }">
        <div class="flex items-center justify-between text-white font-bold py-2 px-4 rounded hover:bg-gray-300 cursor-pointer"
             @click="open = !open">
          <div class="flex items-center justify-center text-center">
          <i class="fa fa-bookmark"  style="font-size: 35px;" aria-hidden="true"></i>
             <span x-show="!collapsed" class="transition-all duration-200">Asignaciones Academicas</span>
          </div>

            <svg x-show="!collapsed" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </div>
        <div x-show="open" class="pl-6 ">
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaTutoresAlumnos') }}">Tutores-Alumnos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200" href="">Contactos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaGruposAlumnos') }}">Grupo-Alumnos</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaGruposDocentes') }}">Grupo-Docente</a>
            <a class="block text-black py-1 px-2 rounded hover:bg-gray-200"
                href="{{ route('ListaGruposMaterias') }}">Grupo-Materia</a>

        </div>
    </div>





















    
   <!-- Botón para colapsar/expandir -->
<button @click="collapsed = !collapsed" 
        class="absolute bottom-12 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white p-3 shadow-md transition-all duration-300 rounded-full animate-led-bg">
    <svg :class="collapsed ? 'rotate-90' : 'rotate-0'" 
         class="w-6 h-6 transition-transform duration-300" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
</button>


</div>












