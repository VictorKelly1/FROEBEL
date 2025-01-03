<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
   <!-- 🧑‍💻 Campo de Búsqueda -->
   <div class="relative mb-4">
                <div class="absolute top-0 right-0 p-2">
                    <input type="search" id="searchInput" placeholder="Buscar Alumno..." 
                        class="buscador-input" style="width: 550px; height: 65px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
                </div>
            </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Apellido Paterno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Apellido Materno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de Nacimiento</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Género</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Ciudad</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Municipio</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Código Postal</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Colonia/Fraccionamiento</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Calle</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Número Exterior</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Estado Civil</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nacionalidad</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Foto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">NoINE</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">RFC</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Lugar de Trabajo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Tutores as $Tutor)
                    <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Tutor->Nombre }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->ApellidoPaterno }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->ApellidoMaterno }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->CURP }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->FechaNacimiento }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Genero }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Ciudad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Municipio }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->CodigoPostal }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->ColFrac }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Calle }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->NumeroExterior }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->EstadoCivil }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Nacionalidad }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->Foto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->NoINE }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->RFC }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $Tutor->LugarTrabajo }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">
                                <form action="/VistaEditarTutor/{{ $Tutor->idTutor }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Editar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{ $Tutores->links() }}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var rows = document.getElementById("tableBody").getElementsByTagName("tr");

            Array.from(rows).forEach(function(row) {
                var text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</x-director.layout>
