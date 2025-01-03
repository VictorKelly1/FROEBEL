<x-director.layout>

    <!-- ✅ Formulario Compacto para Asignación de Grupo -->
    <div class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-1/3">
        <form class="w-full text-white text-xs" action="{{ route('AsignarGrupAlum') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 🧑 Alumno -->
            <div class="mb-2">
                <label for="Alumno" class="block mb-1 text-sm">Alumno:</label>
                <select name="idAlumno" id="Alumno" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    @foreach ($Alumnos as $Alumno)
                        <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 📚 Grupo -->
            <div class="mb-2">
                <label for="Grupo" class="block mb-1 text-sm">Grupo:</label>
                <select name="idGrupo" id="Grupo" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    @foreach ($Grupos as $Grupo)
                        <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                    @endforeach
                </select>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 rounded-md">
                Asignar
            </button>
        </form>
    </div>

    <!-- ✅ Tabla Compacta con Diseño Original -->
    <div class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-1/3 overflow-x-auto">
        <table class="w-full text-xs text-white border-collapse border blue-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-2 py-1 border-b border-blue-500">Matrícula</th>
                    <th class="px-2 py-1 border-b border-blue-500">Nombre</th>
                    <th class="px-2 py-1 border-b border-blue-500">Grupo</th>
                    <th class="px-2 py-1 border-b border-blue-500">Quitar Alumno</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($GrupAlum as $GruposAlum)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-2 py-1 border-t border-blue-500">{{ $GruposAlum->Matricula }}</td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            {{ $GruposAlum->Nombre }} {{ $GruposAlum->ApellidoPaterno }} {{ $GruposAlum->ApellidoMaterno }}
                        </td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            {{ $GruposAlum->NombreGrado }} {{ $GruposAlum->NivelAcademico }} {{ $GruposAlum->Paquete }}
                        </td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            <form action="/GruposAlumnos/{{ $GruposAlum->idGrupoAlumno }}" method="GET">
                                <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-1 text-xs text-center text-white">
        {{ $GrupAlum->links() }}
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
