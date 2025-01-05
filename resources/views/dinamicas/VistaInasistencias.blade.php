<x-director.layout>

    <div posicion1 id="app">
        <h3>
            {{ $Calificaciones->first()->NombreAlumno }}
            {{ $Calificaciones->first()->ApellidoPaterno }}
            {{ $Calificaciones->first()->ApellidoMaterno }}
        </h3>
    </div>
    <div
        class="posiciontablas flex items-center justify-center bg-gray-900 p-2 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-3/4 overflow-x-auto z-30">
        <div class="w-full max-w-full">


            <!-- ✅ Tabla sin cambios en tamaño -->
            <table class="text-sm text-left text-white w-full table-auto z-30">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Foto</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Fecha</th>
                        <th class="px-4 py-2 text-lg border-b border-blue-500 animate-border text-center">Motivo</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($Calificaciones as $Calificacion)
                        <tr class="hover:bg-gray-800 bg-transparent">
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Calificacion->Foto }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Calificacion->Fecha }}</td>
                            <td class="px-4 py-2 border-t border-blue-500 animate-border text-center">
                                {{ $Calificacion->Motivo }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


</x-director.layout>
