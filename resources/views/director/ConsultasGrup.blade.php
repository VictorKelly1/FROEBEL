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
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 1120px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
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
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Clave</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Grado</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Paquete</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Nivel
                            Academico</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de
                            Inicio</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha de Fin
                        </th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Tipo</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Cantidad de
                            Alumnos</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Eliminar</th>


                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Grupos as $Grupo)
                        <tr>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->ClavePeriodo }}
                            </td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->NombreGrado }}
                            </td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->Paquete }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->NivelAcademico }}
                            </td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->FechaInicio }}
                            </td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->FechaFin }}</td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->TipoPeriodo }}
                            </td>
                            <td class="px-6 py-4 border-t border-blue-500 animate-border text-center">
                                {{ $Grupo->cantidadAlumnos }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                <form action="#" method="GET">
                                    <button
                                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    {{ $Grupos->links() }}
                </tbody>
            </table>
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
