<x-director.layout>

    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
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
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Alumno</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Matrícula
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Nombre</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">CURP</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Calificaciones</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Colegiaturas
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Inasistencias</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">
                            Comunicado</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Edición</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Alumnos as $alumno)
                    <tr class="hover:bg-gray-800 bg-transparent">
                        <!-- Foto -->
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            @if ($alumno->Foto)
                            <img src="{{ asset('fotos/' . $alumno->Foto) }}" alt="Usuario" class="w-28 h-28 rounded-full">
                            @else
                            <span class="text-gray-500">Sin foto</span>
                            @endif
                        </td>
                        
                        <!-- Matrícula -->
                        <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $alumno->Matricula }}</td>
                        
                        <!-- Nombre -->
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            {{ $alumno->Nombre }} {{ $alumno->ApellidoPaterno }} {{ $alumno->ApellidoMaterno }}
                        </td>

                        <!-- CURP -->
                        <td class="px-4 py-2 border-t border-blue-500 animate-border">{{ $alumno->CURP }}</td>

                        <!-- Botones de Acción -->
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="/CalificacionAlumno/{{ $alumno->idAlumno }}" method="GET">
                                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Calificaciones</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="/VistaRegistrarColegiatura/{{ $alumno->idAlumno }}" method="GET">
                                <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Pagar</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="" method="GET">
                                <button class="bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Inasistencias</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="/VistaComunicadoPersonal/{{ $alumno->idAlumno }}" method="GET">
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Comunicado</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                            <form action="/VistaEditarAlumno/{{ $alumno->idAlumno }}" method="GET">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Editar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{ $Alumnos->links() }}
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
window.onload = function() {
    var successAlert = document.querySelector('.alert');
    if (successAlert) {
        successAlert.classList.add('show');
        setTimeout(function() {
            successAlert.classList.remove('show');
        }, 5000); // El mensaje se oculta después de 5 segundos
    }
};




</script>





</x-director.layout>
