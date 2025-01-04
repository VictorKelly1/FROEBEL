<x-docente.layout>



    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablas absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 550px; height: 65px; padding: 8px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Alumno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Matrícula</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Registrar Asistencia</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($AlumnosDelGrupo as $AlumnoDelGrupo)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <!-- Foto -->
                            {{-- <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            @if ($AlumnoDelGrupo->Foto)
                            <img src="{{ asset('fotos/' . $AlumnoDelGrupo->Foto) }}" alt="Usuario" class="w-28 h-28 rounded-full">
                            @else
                            <span class="text-gray-500">Sin foto</span>
                            @endif
                        </td> --}}
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $AlumnoDelGrupo->Nombre }} {{ $AlumnoDelGrupo->ApellidoPaterno }}
                                {{ $AlumnoDelGrupo->ApellidoMaterno }}
                            </td>
                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-blue-500 animate-border">
                                {{ $AlumnoDelGrupo->Matricula }}</td>

                            <!-- Nombre -->

                            <td>
                                <input type="checkbox" name="seleccionar[]" value="{{ $AlumnoDelGrupo->idAlumno }}">
                            </td>


                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="flex justify-center mt-4">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600 transition-all duration-200">
                    Guardar Cambios
                </button>
            </div>
        </div>
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

















</x-docente.layout>