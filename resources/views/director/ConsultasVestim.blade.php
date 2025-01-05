<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

   <!-- 🧑‍💻 Campo de Búsqueda -->
   <div class="relative mb-4">
                <div class="posiciontablaalumno absolute top-0 right-0 p-2">
                    <input type="search" id="searchInput" placeholder="Buscar Alumno..." 
                        class="buscador-input" style="width: 1120px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
                </div>
            </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>

                        <th class="px-3 py-2 border-b border-blue-500 animate-border">Foto</th>
                        <th class="px-3 py-2 border-b border-blue-500 animate-border">Nombre</th>
                        <th class="px-3 py-2 border-b border-blue-500 animate-border">Fecha</th>
                        <th class="px-3 py-2 border-b border-blue-500 animate-border">Motivo</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Vestimentas as $Vestimenta)
                        <tr class="hover:bg-gray-800 bg-transparent text-center">

                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Vestimenta->Foto }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Vestimenta->Nombre }} {{ $Vestimenta->ApellidoPaterno }} {{ $Vestimenta->ApellidoMaterno }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Vestimenta->Fecha }}</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Vestimenta->Motivo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-2 text-xs">
            {{ $Vestimentas->links() }}
        </div>

    </div>

    <!-- Script de Búsqueda -->
    <script>
        document.getElementById("searchInput").addEventListener("input", function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#tableBody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>
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
