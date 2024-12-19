<header class="led bg-gray-900 text-white flex items-center justify-between p-4 tamañoletra fixed top-0 left-0 w-[100vw] z-50">
  

    <!-- Sección Izquierda -->
    <div class="flex items-center space-x-4">
        <!-- Icono de Usuario -->
        <div class="relative">
            <img src="{{ asset('images/b1.png') }}" alt="Usuario" class="w-10 h-10 rounded-full">
            <!-- Indicador de estado -->
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 rounded-full"></span>
        </div>
        <!-- Nombre del Usuario -->
        <div>
            <span class="text-sm font-semibold uppercase">MARIO DE LA CRUZ FLORES</span>
        </div>
    </div>

    <!-- Título -->
    <div class="flex items-center space-x-2">
        
    <div class="relative">
    <!-- Decoración -->
    <h1 class="relative tamañoletra font-bold text-4xl tracking-widest font-cinzel">
        COLEGIO FROEBEL
    </h1>
</div>
    </div>

    <!-- Sección Derecha -->
    <div class="flex items-center space-x-4">
        <!-- Idioma -->
        <button class="text-gray-300 hover:text-white">
            <i class="fas fa-globe"></i>
        </button>
        <!-- Cuadro de búsqueda -->
        <div class="relative">
            <input
                type="text"
                class="bg-white text-gray-900 rounded-full px-4 py-1 text-sm"
                placeholder="Buscar...">
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</header>
