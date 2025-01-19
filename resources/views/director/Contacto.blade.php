<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    </div>
    <!-- ✅ Formulario Compacto de Asignación de Contacto -->
    <div
        class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2">
        <form class="w-full text-white text-base" action="{{ route('AsignarContacto') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <!-- 🔍 Buscador -->
            <input type="text" id="searchInput" placeholder="Buscar..."
                class="mb-4 p-2 rounded-md border border-blue-500 text-black w-full md:w-1/2">


            <!-- 📋 Encabezado -->
            <h3 class="text-lg font-bold mb-4 text-center">Datos Personales</h3>

            <!-- 🧑 Persona -->
            <div class="mb-4">
                <label for="Persona" class="block mb-2 text-lg">Persona:</label>
                <select name="idPersona" id="Persona"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione</option>
                    @foreach ($Personas as $Persona)
                        <option value="{{ $Persona->idPersona }}" class="personaOption">
                            {{ $Persona->CURP }} - {{ $Persona->Nombre }} {{ $Persona->ApellidoPaterno }}
                            {{ $Persona->ApellidoMaterno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 📞 Tipo de Contacto -->
            <div class="mb-4">
                <label for="TipoContacto" class="block mb-2 text-lg">Tipo de Contacto:</label>
                <select name="TipoContacto" id="TipoContacto"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
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
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-lg">
                Asignar Contacto
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const searchValue = searchInput.value.toLowerCase();

                Array.from(rows).forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(searchValue) ? '' : 'none';
                });
            });
        });
    </script>

    <!-- ✅ Tabla Compacta de Contactos -->
    <div
        class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
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
    <script>
        // Mostrar alerta
        document.querySelector('.alert').classList.add('show');

        // Después de 5 segundos, aplicar la clase de desvanecimiento y eliminarla
        setTimeout(() => {
            let alertElement = document.querySelector('.alert');
            alertElement.classList.add('fade-out');

            // Esperar el final de la animación para eliminar el elemento del DOM
            setTimeout(() => {
                alertElement.remove();
            }, 1000); // Aseguramos que la animación de desvanecimiento termine antes de eliminarla
        }, 5000); // 5 segundos de espera
    </script>
</x-director.layout>
