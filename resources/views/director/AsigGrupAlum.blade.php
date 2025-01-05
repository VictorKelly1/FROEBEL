<x-director.layout>

    <!-- 🧑‍💻 Campo de Búsqueda para Filtrar Alumnos -->
    <div class="relative mb-4">
        <div class="absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 550px; height: 50px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>

    <!-- ✅ Formulario Compacto para Asignación de Grupo -->
    <div
        class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2">
        <form class="w-full text-white text-base" action="{{ route('AsignarGrupAlum') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- 🧑 Alumno -->
            <div class="mb-4">
                <label for="Alumno" class="block mb-2 text-lg">Alumno:</label>
                <select name="idAlumno" id="Alumno"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione</option>
                    @foreach ($Alumnos as $Alumno)
                        <option value="{{ $Alumno->idAlumno }}" class="alumnoOption">
                            {{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }}
                            {{ $Alumno->ApellidoMaterno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 📚 Grupo -->
            <div class="mb-4">
                <label for="Grupo" class="block mb-2 text-lg">Grupo:</label>
                <select name="idGrupo" id="Grupo"
                    class="w-full px-4 py-2 rounded-md bg-gray-800 border border-blue-500 text-white text-lg" required>
                    <option value="">Seleccione</option>
                    @foreach ($Grupos as $Grupo)
                        <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->ClavePeriodo }} - {{ $Grupo->NombreGrado }}
                            {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                    @endforeach
                </select>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-lg">
                Asignar
            </button>
        </form>
    </div>

    <!-- ✅ Tabla Compacta con Diseño Original -->
    <div
        class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-6 mt-6 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-2/3 lg:w-1/2 overflow-x-auto">
        <table class="w-full text-lg text-white border-collapse border blue-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-4 py-2 border-b border-blue-500">Matrícula</th>
                    <th class="px-4 py-2 border-b border-blue-500">Nombre</th>
                    <th class="px-4 py-2 border-b border-blue-500">Grupo</th>
                    <th class="px-4 py-2 border-b border-blue-500">Periodo del grupo</th>
                    <th class="px-4 py-2 border-b border-blue-500">Quitar Alumno</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($GrupAlum as $GruposAlum)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-4 py-2 border-t border-blue-500">{{ $GruposAlum->Matricula }}</td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $GruposAlum->Nombre }} {{ $GruposAlum->ApellidoPaterno }}
                            {{ $GruposAlum->ApellidoMaterno }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $GruposAlum->NombreGrado }} {{ $GruposAlum->NivelAcademico }}
                            {{ $GruposAlum->Paquete }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            {{ $GruposAlum->ClavePeriodo }}
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500">
                            <form action="/GruposAlumnos/{{ $GruposAlum->idGrupoAlumno }}" method="GET">
                                <button
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-lg">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-4 text-lg text-center text-white">
        {{ $GrupAlum->links() }}
    </div>

    <!-- ✅ Funcionalidad de Búsqueda en Tiempo Real -->
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
