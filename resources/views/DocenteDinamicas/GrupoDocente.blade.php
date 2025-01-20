<x-docente.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablaalumno absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 1110px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
        </div>
    </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-red-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-red-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">
                            Alumno</th>
                        <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Matrícula
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">
                            Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">
                            Calificar</th>
                        <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Comunicado
                        </th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($AlumnosDelGrupo as $AlumnoDelGrupo)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <!-- Foto -->
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                @if ($AlumnoDelGrupo->Foto)
                                    <img src="{{ asset('fotos/' . $AlumnoDelGrupo->Foto) }}" alt="Usuario"
                                        class="w-28 h-28 rounded-full">
                                @else
                                    <span class="text-gray-500">Sin foto</span>
                                @endif
                            </td>

                            <!-- Matrícula -->
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                {{ $AlumnoDelGrupo->Matricula }}</td>

                            <!-- Nombre -->
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                {{ $AlumnoDelGrupo->Nombre }} {{ $AlumnoDelGrupo->ApellidoPaterno }}
                                {{ $AlumnoDelGrupo->ApellidoMaterno }}
                            </td>

                            <!-- Botones de Acción -->
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                <form action="/VistaRegistrarCalificacion/{{ $AlumnoDelGrupo->idAlumno }}"
                                    method="GET">
                                    <button
                                        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-600">Calificar</button>
                                        <input type="hidden" name="NivelAcademico" value="{{ $AlumnoDelGrupo->NivelAcademico }}">

                                </form>
                            </td>
                            <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                <form action="/#/{{ $AlumnoDelGrupo->idAlumno }}" method="GET">
                                    <button
                                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-red-600">Comunicado</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
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



</x-docente.layout>
