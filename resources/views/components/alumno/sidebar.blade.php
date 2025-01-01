<!-- Sidebar -->
<div x-data="{ collapsed: false }" 
     :class="collapsed ? 'w-20' : 'w-64'" 
     class="sidebar bg-gray-900 h-screen p-4 fixed top-0 left-0 z-70 overflow-y-auto transition-all duration-200 ease-in-out flex flex-col justify-between">

     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>


    <!-- Opciones del Sidebar -->
    <nav class="flex-1 space-y-2">
        <!-- Opción Home -->
    <a href="{{ route('MenuAlumno') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 transition-all duration-200">
    <div class="flex items-center justify-center"  style="font-size: 20px;">
    <span x-show="!collapsed" class="transition-all duration-200">INICIO</span>
</div>

    </a>

        <!-- Botón CALIFICACIONES -->
        <a href="{{ route('MisCalificaciones') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-purple-500 transition-all duration-200">
            <i class="fas fa-graduation-cap text-xl" style="font-size: 30px;"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">CALIFICACIONES</span>
        </a>

        <!-- Botón INASISTENCIAS -->
        <a href="{{ route('MisInasistencias') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-purple-500 transition-all duration-200">
            <i class="fas fa-user-times text-xl" style="font-size: 30px;"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">INASISTENCIAS</span>
        </a>

        <!-- Botón HORARIO -->
        <a href="{{ route('MiHorario') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-purple-500 transition-all duration-200">
            <i class="fas fa-clock text-xl" style="font-size: 30px;"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">HORARIO</span>
        </a>

        <!-- Botón PAGOS -->
        <a href="{{ route('MisColegiaturas') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-purple-500 transition-all duration-200">
            <i class="fas fa-wallet text-xl" style="font-size: 30px;"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">PAGOS</span>
        </a>
    </nav>

   
    <!-- Botón para colapsar/expandir -->
    <button @click="collapsed = !collapsed" 
            class="bg-orange-600 text-white p-3 shadow-md rounded-full transition-all duration-300 self-center mb-4">
        <svg :class="collapsed ? 'rotate-180' : 'rotate-0'" 
             class="w-6 h-6 transition-transform duration-300" 
             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</div>