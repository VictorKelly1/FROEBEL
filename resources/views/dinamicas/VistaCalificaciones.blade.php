<x-director.layout>

    @if (!empty($Calificaciones))
        <div posicion1 id="app">


            <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas05 borderAnimation">

                <!-- Primera Tabla -->
                <div class="overflow-x-auto">
                    <h3>
                        {{ $Calificaciones->first()->NombreAlumno }}
                        {{ $Calificaciones->first()->ApellidoPaterno }}
                        {{ $Calificaciones->first()->ApellidoMaterno }}
                    </h3>
   
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Materia</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Grupo</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 1</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 2</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 3</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 4</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 5</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Parcial 6</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($Calificaciones as $Calificacion)
                            <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->NombreMateria }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->NombreGrado }} {{ $Calificacion->NivelAcademico }}
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Paquete }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial1 }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial2 }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial3 }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial4 }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial5 }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->Parcial6 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
         </div>
  </div>
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <div
        class="posiciontablas2 flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Materia</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Trimestre 1</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Trimestre 2</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Trimestre 3</th>
                    <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Promedio General</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @php $promedioGeneral = 0; @endphp
                            @foreach ($Calificaciones as $Calificacion)
                                @php
                                    $trimestre1 = ($Calificacion->Parcial1 + $Calificacion->Parcial2) / 2;
                                    $trimestre2 = ($Calificacion->Parcial3 + $Calificacion->Parcial4) / 2;
                                    $trimestre3 = ($Calificacion->Parcial5 + $Calificacion->Parcial6) / 2;
                                    $promedio = ($trimestre1 + $trimestre2 + $trimestre3) / 3;
                                    $promedioGeneral += $promedio;
                                @endphp
                                </tr>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ $Calificacion->NombreMateria }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ number_format($trimestre1, 2) }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ number_format($trimestre2, 2) }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ number_format($trimestre3, 2) }}</td>
                                <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">{{ number_format($promedio, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="hover:bg-gray-800 bg-transparent">
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center" colspan="4">Promedio General de Trimestres:</td>
                        <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
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
