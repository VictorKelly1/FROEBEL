<x-director.layout>

    @if (!empty($Calificaciones))
        <div posicion1 id="app">


            <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation">

                <!-- Primera Tabla -->
                <div class="overflow-x-auto">
                    <h3>
                        {{ $Calificaciones->first()->NombreAlumno }}
                        {{ $Calificaciones->first()->ApellidoPaterno }}
                        {{ $Calificaciones->first()->ApellidoMaterno }}
                    </h3>
                    <table class="text-xs text-left text-white">
                        <thead>
                            <tr class="bg-transparent">
                                <th>Materia</th>
                                <th>Grupo</th>
                                <th>Parcial 1</th>
                                <th>Parcial 2</th>
                                <th>Parcial 3</th>
                                <th>Parcial 4</th>
                                <th>Parcial 5</th>
                                <th>Parcial 6</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Calificaciones as $Calificacion)
                                <tr class="hover:bg-gray-800 bg-transparent">
                                    <td>{{ $Calificacion->NombreMateria }}</td>
                                    <td>{{ $Calificacion->NombreGrado }} {{ $Calificacion->NivelAcademico }}
                                        {{ $Calificacion->Paquete }}</td>
                                    <td>{{ $Calificacion->Parcial1 }}</td>
                                    <td>{{ $Calificacion->Parcial2 }}</td>
                                    <td>{{ $Calificacion->Parcial3 }}</td>
                                    <td>{{ $Calificacion->Parcial4 }}</td>
                                    <td>{{ $Calificacion->Parcial5 }}</td>
                                    <td>{{ $Calificacion->Parcial6 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Segunda Tabla de Trimestres -->
                <div class="overflow-x-auto mt-4">
                    <h3 class="text-white">Tabla de Trimestres</h3>
                    <table class="text-xs text-left text-white">
                        <thead>
                            <tr class="bg-transparent">
                                <th>Materia</th>
                                <th>Trimestre 1</th>
                                <th>Trimestre 2</th>
                                <th>Trimestre 3</th>
                                <th>Promedio General</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $promedioGeneral = 0; @endphp
                            @foreach ($Calificaciones as $Calificacion)
                                @php
                                    $trimestre1 = ($Calificacion->Parcial1 + $Calificacion->Parcial2) / 2;
                                    $trimestre2 = ($Calificacion->Parcial3 + $Calificacion->Parcial4) / 2;
                                    $trimestre3 = ($Calificacion->Parcial5 + $Calificacion->Parcial6) / 2;
                                    $promedio = ($trimestre1 + $trimestre2 + $trimestre3) / 3;
                                    $promedioGeneral += $promedio;
                                @endphp
                                <tr class="hover:bg-gray-800 bg-transparent">
                                    <td>{{ $Calificacion->NombreMateria }}</td>
                                    <td>{{ number_format($trimestre1, 2) }}</td>
                                    <td>{{ number_format($trimestre2, 2) }}</td>
                                    <td>{{ number_format($trimestre3, 2) }}</td>
                                    <td>{{ number_format($promedio, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-700">
                                <td colspan="4" class="text-right font-bold">Promedio General de Trimestres:</td>
                                <td class="font-bold">
                                    {{ number_format($promedioGeneral / $Calificaciones->count(), 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="sindatos">
            ⚠️ No se encontraron datos para mostrar.
        </div>
    @endif

</x-director.layout>
