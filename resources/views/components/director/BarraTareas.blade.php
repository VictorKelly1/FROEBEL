<div class="">
    <!-- Sidebar -->
    <div id="sidebar"
        class="led led2 posicionsidebar w-64 bg-gray-900 text-white flex flex-col transition-all duration-300 ease-in-out
        border-4 border-transparent rounded-lg p-2
        bg-gradient-to-r  to-indigo-800 led2 ">

        <!-- Lista de opciones -->
        <ul class="flex-1 space-y-2 p-4 ">
            <!-- Elemento de menú: Registros -->
            <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-registrar')">
                    <img src="https://via.placeholder.com/24" alt="Registrar" class="w-6 h-6">
                    <span class="text-sm font-medium">Registrar</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-registrar" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

                <!-- Submenú registrar -->
                <ul id="submenu-registrar" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAlumno') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Alumno</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarGrupo') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Grupo</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarDocente') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Docente</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarTutor') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Tutor</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarMateria') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Materia</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarCoordinador') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Coordinador</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAula') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Aula</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('VistaRegistrarAdministrador') }}" class="flex items-center gap-2">
                            <span class="text-sm">Registrar Administrador</span>
                        </a>
                    </li>


                </ul>
            </li>

            <!-- Elemento de menú: Consultas -->
            <li class="flex flex-col items-start gap-2 p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4 cursor-pointer" onclick="toggleSubmenu('submenu-consultas')">
                    <img src="https://via.placeholder.com/24" alt="Consultas" class="w-6 h-6">
                    <span class="text-sm font-medium">Consultas</span>
                    <!-- Flecha de expansión -->
                    <span id="arrow-consultas" class="ml-auto transform rotate-0 transition-transform">
                        &#x25BC; <!-- Flecha hacia abajo -->
                    </span>
                </div>

                <!-- Submenú -->
                <ul id="submenu-consultas" class="hidden bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaAlumnos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Consultar Alumnos</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaDocentes') }}" class="flex items-center gap-2">
                            <span class="text-sm">Consultar Docentes</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaGrupos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Consultar Grupos</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Otros elementos de menú (sin cambios) -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Horarios" class="w-6 h-6">
                <span class="text-sm font-medium">Horarios</span>
            </li>
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Asignaciones" class="w-6 h-6">
                <span class="text-sm font-medium">Asignaciones</span>
            </li>
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Calificaciones" class="w-6 h-6">
                <span class="text-sm font-medium">Calificaciones</span>
            </li>
          
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Ayuda" class="w-6 h-6">
                <span class="text-sm font-medium">Ayuda</span>
            </li>
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Cerrar Sesión" class="w-6 h-6">
                <span class="text-sm font-medium">Cerrar Sesión</span>
            </li>
        </ul>

        <!-- Botón de colapsar -->
        <button id="toggleSidebar"
            class="p-3 bg-purple-700 hover:bg-purple-600 text-white flex justify-center items-center rounded-md mt-12 transition-all duration-200">
            <span class="transform rotate-180 transition-transform" id="toggleIcon">←</span>
        </button>
    </div>
</div>

<script>
    // Función para alternar la visibilidad de los submenús
    function toggleSubmenu(submenuId) {
        var submenu = document.getElementById(submenuId);
        var arrow = document.getElementById('arrow-' + submenuId.split('-')[1]);
        
        submenu.classList.toggle('hidden');
        
        // Cambiar la dirección de la flecha
        if (submenu.classList.contains('hidden')) {
            arrow.classList.remove('rotate-180'); // Flecha hacia arriba
        } else {
            arrow.classList.add('rotate-180'); // Flecha hacia abajo
        }
    }
</script>
