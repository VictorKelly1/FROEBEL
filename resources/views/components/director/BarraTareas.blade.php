<div class="">
    <!-- Sidebar -->
    <div id="sidebar"
        class="led led2 posicionsidebar w-64 bg-gray-900 text-white flex flex-col transition-all duration-300 ease-in-out
        border-4 border-transparent rounded-lg p-2
        bg-gradient-to-r  to-indigo-800 led2 ">

        <!-- Lista de opciones -->
        <ul class="flex-1 space-y-2 p-4 ">
            <!-- Elemento de menú: Transacciones -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="{{ asset('images/transacciones.png') }}" alt="Transacciones"
                    class="icon w-6 h-6 transition-all duration-300">
                <span class="text-sm font-medium transition-opacity duration-300">Registrar</span>
            </li>




            <li
                class="group flex flex-col items-start gap-2 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200 relative">
                <!-- Elemento principal -->
                <div class="flex items-center gap-4">
                    <img src="https://via.placeholder.com/24" alt="Asignaciones" class="w-6 h-6">
                    <span class="text-sm font-medium">Asignaciones</span>
                </div>

                <!-- Submenú -->
                <ul
                    class="hidden group-hover:block bg-gray-700 text-white rounded-lg mt-2 ml-8 p-2 w-48 shadow-lg transition-all duration-300">
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="{{ route('ListaAlumnos') }}" class="flex items-center gap-2">
                            <span class="text-sm">Submenú 1</span>
                        </a>
                    </li>
                    <li class="hover:bg-gray-600 rounded p-2">
                        <a href="/ruta/submenu2" class="flex items-center gap-2">
                            <span class="text-sm">Submenú 2</span>
                        </a>
                    </li>
                </ul>
            </li>










            <!-- Elemento de menú: Horarios -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Horarios" class="w-6 h-6">
                <span class="text-sm font-medium">Horarios</span>
            </li>
            <!-- Elemento de menú: Registrar -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Registrar" class="w-6 h-6">
                <span class="text-sm font-medium">Registrar</span>
            </li>
            <!-- Elemento de menú: Calificaciones -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Calificaciones" class="w-6 h-6">
                <span class="text-sm font-medium">Calificaciones</span>
            </li>
            <!-- Elemento de menú: Grupos -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Grupos" class="w-6 h-6">
                <span class="text-sm font-medium">Grupos</span>
            </li>
            <!-- Elemento de menú: Ayuda -->
            <li class="flex items-center gap-4 hover:bg-gray-800 rounded-lg p-3 transition-all duration-200">
                <img src="https://via.placeholder.com/24" alt="Ayuda" class="w-6 h-6">
                <span class="text-sm font-medium">Ayuda</span>
            </li>
            <!-- Elemento de menú: Cerrar Sesión -->
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
