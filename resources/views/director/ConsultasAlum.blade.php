<x-director.layout>
    <div class="mb-4 Buscadorposicion">
        <input type="text" id="searchInput" class="px-4 py-2 text-white rounded" placeholder="Buscar Alumno...">
    </div>

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">
        <div class="overflow-x-auto">
            <table class="text-sm text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Alumno</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Matrícula</th>
                        <th class="custom-cell px-4 py-2 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">CURP</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Calificaciones</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Pagos</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Inasistencias</th>
                        <th class="px-4 py-2 border-b border-purple-500 animate-border">Edicion</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($Alumnos as $alumno)





                    
                    <tr class="hover:bg-gray-800 bg-transparent">
                        <!-- Foto -->
                        <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                        @if($alumno->Foto)
                        <img src="{{ asset('fotos/' . $alumno->Foto) }}" alt="Usuario" class="w-10 h-10 rounded-full">

                        @else
                            <span class="text-gray-500">Sin foto</span>
                        @endif
                    </td>




                        <!-- Matrícula -->
                        <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $alumno->Matricula }}</td>

                        <!-- Nombre -->
                        <td class="custom-cell px-4 py-2 border-t border-purple-500 animate-border">{{ $alumno->Nombre }} {{ $alumno->ApellidoPaterno }} {{ $alumno->ApellidoMaterno }}</td>

                        <!-- CURP -->
                        <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $alumno->CURP }}</td>

                        <!-- Botones -->
                        <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                            <form action="/CalificacionAlumno/{{ $alumno->idAlumno }}" method="GET">
                                @csrf
                                <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Calificaciones</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                            <form action="/VistaRegistrarColegiatura/{{ $alumno->idAlumno }}" method="GET">
                                @csrf
                                <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Pagar</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                            <form action="" method="GET">
                                @csrf
                                <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Inasistencias</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                            <form action="/VistaEditarAlumno/{{ $alumno->idAlumno }}" method="GET">
                                @csrf
                                <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Editar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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

    <style>
        .custom-cell {
            min-width: 230px;
        }

        .rounded-full {
            border-radius: 50%;
        }

        .object-cover {
            object-fit: cover;
        }
    </style>
</x-director.layout>
