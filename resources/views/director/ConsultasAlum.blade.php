<x-director.layout>
    <div class="mb-4 Buscadorposicion">
        <input type="text" id="searchInput" class="px-4 py-2 text-white rounded" placeholder="Buscar Alumno...">
    </div>

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden">
        <div class="overflow-x-auto w-full max-w-full">
            <table class="text-sm text-left text-white w-full table-auto">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Foto del
                            Alumno</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Matrícula
                        </th>
                        <th class="custom-cell px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Calificaciones</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Colegiaturas
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Inasistencias</th>
                            <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">
                            Comunicado</th>
                        <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Edicion</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Alumnos as $alumno)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <!-- Foto -->
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                @if ($alumno->Foto)
                                    <img src="{{ asset('fotos/' . $alumno->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>

                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $alumno->Matricula }}
                            </td>

                            <!-- Nombre -->
                            <td class="custom-cell px-4 py-2 border-t border-purple-500 animate-border text-center">
                                {{ $alumno->Nombre }} {{ $alumno->ApellidoPaterno }} {{ $alumno->ApellidoMaterno }}</td>

                            <!-- CURP -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border">{{ $alumno->CURP }}</td>

                            <!-- Botones -->
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="/CalificacionAlumno/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button
                                        class="bg-red-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Calificaciones</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaRegistrarColegiatura/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button
                                        class="bg-green-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Pagar</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="" method="GET">
                                    @csrf
                                    <button
                                        class="bg-orange-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">Inasistencias</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaComunicadoPersonal/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button
                                        class="bg-blue-900 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">
                                        Comunicado
                                    </button>

                                </form>
                            </td>
                            <td class="px-4 py-2 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaEditarAlumno/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button
                                        class="bg-blue-600 text-white px-4 py-3 rounded-lg transition-all duration-500 hover:bg-purple-600 hover:-translate-y-2 hover:shadow-2xl">
                                        Editar
                                    </button>

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

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</x-director.layout>
