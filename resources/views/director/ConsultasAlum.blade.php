<x-director.layout>
<div class="mb-4 Buscadorposicion">
            <input type="text" id="searchInput" class="px-4 py-2 text-white rounded" placeholder="Buscar Alumno...">
        </div>


    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">

        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Apellido Paterno</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Apellido Materno</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">CURP</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Fecha de Nacimiento</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Género</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Ciudad</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Municipio</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Código Postal</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Colonia/Fraccionamiento</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Calle</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Número Exterior</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Estado Civil</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nacionalidad</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Correo Electrónico</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Matrícula</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Escuela de Procedencia</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Calificaciones</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($Alumnos as $alumno)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Nombre }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->ApellidoPaterno }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->ApellidoMaterno }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->CURP }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->FechaNacimiento }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Genero }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Ciudad }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Municipio }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->CodigoPostal }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->ColFrac }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Calle }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->NumeroExterior }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->EstadoCivil }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Nacionalidad }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Correo }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->Matricula }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $alumno->EscuelaProcede }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/CalificacionAlumno/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Calificaciones</button>
                                </form>
                            </td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaEditarAlumno/{{ $alumno->idAlumno }}" method="GET">
                                    @csrf
                                    <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Edición</button>
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




</x-director.layout>
