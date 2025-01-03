<!-- Sidebar -->
<div x-data="{ collapsed: false }" :class="collapsed ? 'w-20' : 'w-64'"
    class="sidebar bg-gray-950 h-screen p-4 fixed top-0 left-0 z-70 overflow-y-auto transition-all duration-200 ease-in-out flex flex-col justify-between">

    <!-- Espaciado Superior -->
    <div class="mb-4"></div>

    <p>" "</p>
    <p>" "</p>
    <p>&nbsp;</p>


    <!-- Opciones del Sidebar -->
    <nav class="flex-1 space-y-2">
        <!-- Opción Inicio -->
        <a href="#"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class=" text-xl "></i>
            <span style="font-size: 20px;" x-show="!collapsed" class="ml-3 transition-all duration-200">INICIO</span>
        </a>

        <!-- Opción Calificaciones -->
        <!-- Opción Principal con Submenú -->
        <div x-data="{ open: false }">
            <a href="#" @click="open = !open"
                class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
                <i class="fas fa-file-alt text-xl"></i>
                <span x-show="!collapsed" class="ml-3 transition-all duration-200">GRUPOS</span>
                <i class="fas fa-chevron-down ml-auto" :class="{ 'rotate-180': open }"></i>
            </a>
            <!-- Submenú -->
            <div x-show="open" x-collapse class="pl-8 mt-1">
                @if (Session::has('Grupos'))
                    @foreach (Session::get('Grupos') as $grupo)
                        <a href="#"
                            class="block text-white py-1 px-2 hover:bg-gray-300 hover:text-black transition-all duration-200">
                            {{ $grupo->NombreGrado }} {{ $grupo->NivelAcademico }} {{ $grupo->Paquete }}
                        </a>
                    @endforeach
                @else
                    <p class="text-gray-400 text-sm">No hay grupos disponibles.</p>
                @endif
            </div>
        </div>



        <!-- Opción Comunicado -->
        <a href="#"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class="fas fa-bullhorn text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">COMUNICADO</span>
        </a>

        <!-- Opción Horarios -->
        <a href="#"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class="fas fa-calendar-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">HORARIOS</span>
        </a>

        <!-- Opción Inasistencias -->
        <a href="#"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class="fas fa-user-times text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">INASISTENCIAS</span>
        </a>

        <!-- Opción Mis Inasistencias -->
        <a href="{{ route('InasistenciasDocente') }}"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class="fas fa-user-check text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">MIS
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INASISTENCIAS</span>
        </a>
    </nav>

    <!-- Botón para colapsar/expandir -->
    <button @click="collapsed = !collapsed"
        class="bg-red-600 text-white p-3 shadow-md rounded-full transition-all duration-100 self-center mb-4">
        <svg :class="collapsed ? 'rotate-180' : 'rotate-0'" class="w-6 h-6 transition-transform duration-300"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</div>
