<x-director.layout>

    <!-- 🧑‍💻 Campo de Búsqueda para Filtrar Personas -->
    <div class="relative mb-4">
        <div class="absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Persona..." 
                class="buscador-input" style="width: 550px; height: 50px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>

    <!-- ✅ Formulario Compacto de Asignación de Contacto -->
    <div class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2">
        <form class="w-full text-white text-base" action="{{ route('AsignarContacto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 📋 Encabezado -->
            <h3 class="text-lg font-bold mb-4 text-center">Datos Personales</h3>

            <!-- 🧑 Persona -->
            <div class="mb-4">
                <label for="Persona" class="block mb-2 text-lg">Persona:</label>
                <select name="idPersona" id="Persona" class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione</option>
                    @foreach ($Personas as $Persona)
                        <option value="{{ $Persona->idPersona }}" class="personaOption">
                            {{ $Persona->CURP }} - {{ $Persona->Nombre }} {{ $Persona->ApellidoPaterno }} {{ $Persona->ApellidoMaterno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 📞 Tipo de Contacto -->
            <div class="mb-4">
                <label for="TipoContacto" class="block mb-2 text-lg">Tipo de Contacto:</label>
                <select name="TipoContacto" id="TipoContacto" class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione</option>
                    <option value="Email">Email</option>
                    <option value="Celular">Celular</option>
                </select>
            </div>

            <!-- 📲 Valor de Contacto -->
            <div class="mb-4">
                <label for="ValorContacto" class="block mb-2 text-lg">Valor de Contacto:</label>
                <input type="text" name="ValorContacto" id="ValorContacto"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-lg">
                Asignar Contacto
            </button>
        </form>
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real para Personas -->
    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var options = document.querySelectorAll(".personaOption");

            options.forEach(function(option) {
                var text = option.textContent.toLowerCase();
                if (text.includes(filter)) {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            });
        });
    </script>

    <!-- ✅ Tabla Compacta de Contactos -->
    <div class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
        <table class="w-full text-lg text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-4 py-2 border-b border-blue-500">Persona</th>
                    <th class="px-4 py-2 border-b border-blue-500">Tipo</th>
                    <th class="px-4 py-2 border-b border-blue-500">Contacto</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($Contactos as $Contacto)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Contacto->Nombre }} {{ $Contacto->ApellidoPaterno }} {{ $Contacto->ApellidoMaterno }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Contacto->TipoContacto }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $Contacto->ValorContacto }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-4 text-lg text-center text-white">
        {{ $Contactos->links() }}
    </div>

</x-director.layout>
