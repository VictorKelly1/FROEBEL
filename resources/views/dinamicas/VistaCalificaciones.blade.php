<x-director.layout>

    <div posicion1 id="app">
        <!-- Input para buscar al alumno -->
        <label for="search">Alumno:</label>
        <input type="text" id="search" placeholder="Buscar alumno..." oninput="filterTable(event)" />

        <!-- Botón para imprimir la tabla -->
        <button posicion2 id="btn-imprimir" onclick="printTable()">🖨️ IMPRIMIR</button>

        <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">

            <div class="overflow-x-auto">
                <h3>
                    {{ $Calificaciones->first()->NombreAlumno }}
                    {{ $Calificaciones->first()->ApellidoPaterno }}
                    {{ $Calificaciones->first()->ApellidoMaterno }}
                </h3>
                <table class=" text-xs text-left text-white">
                    <thead>
                        <tr class="bg-transparent">

                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Materia</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 1</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 2</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 3</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 4</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 5</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Parcial 6</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Calificaciones as $Calificacion)
                            <tr class="hover:bg-gray-800 bg-transparent">


                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->NombreMateria }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->NombreGrado }}
                                    {{ $Calificacion->NivelAcademico }}
                                    {{ $Calificacion->Paquete }}
                                </td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial1 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial2 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial3 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial4 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial5 }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                    {{ $Calificacion->Parcial6 }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

</x-director.layout>
