<x-director.layout>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenedor Principal -->
    <div class="flex flex-col items-center bg-gray-900 p-2 posiciontablas borderAnimation rounded-md max-w-md mx-auto shadow-md">

        <!-- Buscador -->
        <div class="relative tamañobuscadorsidebar w-full mb-2">
            <div class="buscador-contenedor">
                <input type="search" id="searchInput" 
                       placeholder="Buscar Alumno..." 
                       class="buscador-input w-full p-1 text-sm rounded-md border border-gray-600 focus:outline-none focus:border-purple-500">
            </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto w-full">
            <table class="w-full text-xs text-white border-collapse border border-purple-500 rounded-md shadow-sm">
                <thead>
                    <tr class="bg-transparent text-center">

                        <th class="px-3 py-2 border-b border-purple-500 animate-border">Foto</th>
                        <th class="px-3 py-2 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-3 py-2 border-b border-purple-500 animate-border">Fecha</th>
                        <th class="px-3 py-2 border-b border-purple-500 animate-border">Motivo</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Vestimentas as $Vestimenta)
                        <tr class="hover:bg-gray-800 bg-transparent text-center">

                            <td class="px-3 py-2 border-t border-purple-500 animate-border">{{ $Vestimenta->Foto }}</td>
                            <td class="px-3 py-2 border-t border-purple-500 animate-border">{{ $Vestimenta->Nombre }} {{ $Vestimenta->ApellidoPaterno }} {{ $Vestimenta->ApellidoMaterno }}</td>
                            <td class="px-3 py-2 border-t border-purple-500 animate-border">{{ $Vestimenta->Fecha }}</td>
                            <td class="px-3 py-2 border-t border-purple-500 animate-border">{{ $Vestimenta->Motivo }}</td>
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

</x-director.layout>
