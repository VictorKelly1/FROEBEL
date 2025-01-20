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
    <!-- Opción Home -->
    <a href="{{ route('MenuDocente') }}"
        class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 transition-all duration-200">
        <div class="flex items-center justify-center" style="font-size: 20px;">
            <span x-show="!collapsed" class="transition-all duration-200">INICIO</span>
        </div>

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
                        <form
                            class="block text-white py-1 px-2 hover:bg-gray-300 hover:text-black transition-all duration-200"
                            action="/VerGrupo/{{ $grupo->idGrupo }}" method="GET">

                            <button class="#">
                                {{ $grupo->NombreGrado }}
                                {{ $grupo->NivelAcademico }}
                                {{ $grupo->Paquete }}
                            </button>

                        </form>
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
        <a href="{{ route('MisHorarios') }}"
            class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
            <i class="fas fa-calendar-alt text-xl"></i>
            <span x-show="!collapsed" class="ml-3 transition-all duration-200">HORARIOS</span>
        </a>

        <!-- Opción Inasistencias -->
        <div x-data="{ open: false }">
            <a href="#" @click="open = !open"
                class="flex items-center text-white font-bold py-2 px-4 rounded hover:bg-gray-300 hover:text-black hover:border-l-4 hover:border-red-500 transition-all duration-200">
                <i class="fas fa-file-alt text-xl"></i>
                <span x-show="!collapsed" class="ml-3 transition-all duration-200">Nombrar lista</span>
                <i class="fas fa-chevron-down ml-auto" :class="{ 'rotate-180': open }"></i>
            </a>

            <!-- Submenú -->
            <div x-show="open" x-collapse class="pl-8 mt-1">
                @if (Session::has('Grupos'))
                    @foreach (Session::get('Grupos') as $grupo)
                        <form
                            class="block text-white py-1 px-2 hover:bg-gray-300 hover:text-black transition-all duration-200"
                            action="/listaRegistrarInasistencia/{{ $grupo->idGrupo }}" method="GET">

                            <button class="#">
                                {{ $grupo->NombreGrado }}
                                {{ $grupo->NivelAcademico }}
                                {{ $grupo->Paquete }}
                            </button>

                        </form>
                    @endforeach
                @else
                    <p class="text-gray-400 text-sm">No hay grupos disponibles.</p>
                @endif
            </div>
        </div>





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
    style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); width: 56px; height: 56px; background: linear-gradient(145deg,rgb(255, 3, 3), #3B82F6); color: #FFFFFF; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3), -4px -4px 8px rgba(255, 255, 255, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease; cursor: pointer; overflow: hidden;">
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
