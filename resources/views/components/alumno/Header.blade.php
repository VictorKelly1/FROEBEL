<header
    class=" bg-gray-900 text-white flex items-center justify-between p-4 tamañoletra fixed top-0 left-0 w-[100vw] z-50">


    <!-- Sección Izquierda -->
    <div class="flex items-center space-x-4">
        <!-- Icono de Usuario -->
        <h1>
            <img src="{{ asset('images/logo.png') }}" alt="Header Image" class="imagen-header">
        </h1>

        <h1>
            <img src="{{ asset('images/letralogo.png') }}" alt="Header Image" class="imagen-header2">
        </h1>






        <!-- Nombre del Usuario -->

    </div>

    <!-- Título -->
    <div class="flex items-center space-x-2">

        <div class="relative">
            <!-- Decoración -->

        </div>
    </div>

    <!-- Sección Derecha -->
    <div class="flex items-center space-x-4">
        <!-- Idioma -->
        <button class="text-gray-300 hover:text-white">
            <i class="fas fa-globe"></i>
        </button>
        <div>
            <span class="text-sm font-semibold uppercase">{{ Session::get('Nombre') }}.</span>
        </div>
        <button class="dropdown-btn">
        <img src="{{ asset('fotos/' . Session::get('Foto')) }}" alt="Perfil" class="img-perfil">
            <!-- Indicador de estado -->
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 rounded-full"></span>
        </button>

        <!-- Menú desplegable -->
        <div class="dropdown-content">
            <a href="#">Cambiar cuenta</a>
            <a href="#">Configuración</a>
            <a href="#">Cambiar Tema</a>
            <a href="#">Cerrar sesión</a>

        </div>

    </div>



    <script>
        document.querySelector('.dropdown-btn').addEventListener('click', function() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
        });
    </script>

</header>
