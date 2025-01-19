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
        <!-- Opción Inicio -->
        <a href="#" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i class=" text-xl "></i>
            <span style="font-size: 20px;" x-show="!collapsed" class="ml-3 transition-all duration-200">INICIO</span>
        </a>

        <!-- Opción Calificaciones -->
        <a href="{{ route('MisCalificaciones') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i class="fas fa-file-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">CALIFICACIONES</span>
        </a>

        <!-- Opción Comunicado -->
        <a href="{{ route('MisInasistencias') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i class="fas fa-bullhorn text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">INASISTENCIAS</span>
        </a>

        <!-- Opción Horarios -->
        <a href="{{ route('MiHorario') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i class="fas fa-calendar-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">HORARIO</span>
        </a>

        <!-- Opción Inasistencias -->
        <a href="{{ route('MisColegiaturas') }}" class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-blue-500 transition-all duration-200">
            <i class="fas fa-user-times text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">PAGOS</span>
        </a>

   
   
 <!-- Botón para colapsar/expandir -->
 <button @click="collapsed = !collapsed"
    style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); width: 56px; height: 56px; background: linear-gradient(145deg,rgb(0, 247, 255), #3B82F6); color: #FFFFFF; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3), -4px -4px 8px rgba(255, 255, 255, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease; cursor: pointer; overflow: hidden;">
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
