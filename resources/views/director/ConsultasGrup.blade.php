<x-director.layout>
<div class="alert alert-success">
        {{ session('success') }}
    </div>

    <div class=" flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation overflow-x-hidden z-30">
        <div class="overflow-x-auto w-full max-w-full z-30">
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead>
                <div class="relative tamañobuscadorsidebar">
    <div class="buscador-contenedor">
        <input type="search" id="searchInput" 
            placeholder="Buscar Alumno..." class="buscador-input">
    </div>
</div>

                    <tr class="bg-transparent">
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Clave</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Grado</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Paquete</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Nivel Academico</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha de Inicio</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Fecha de Fin</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Tipo</th>
                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Cantidad de Alumnos</th>

                    <th class="px-4 py-2 text-lg border-b border-purple-500 animate-border text-center">Editar</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Grupos as $Grupo)
                    <tr class="hover:bg-gray-800 bg-transparent">
                    <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->ClavePeriodo }}
                            </td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->NombreGrado }}
                            </td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->Paquete }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->NivelAcademico }}
                            </td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->FechaInicio }}
                            </td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->FechaFin }}</td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">{{ $Grupo->TipoPeriodo }}
                            </td>
                            <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                {{ $Grupo->cantidadAlumnos }}</td>
                                <td class="px-6 py-4 border-t border-purple-500 animate-border text-center">
                                <form action="/VistaEditarGrupo/{{ $Grupo->idGrupo }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edición</button>
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






</x-director.layout>
