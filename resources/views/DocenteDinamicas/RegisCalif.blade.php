<x-docente.layout>

@if (!empty($Calificaciones))
    <!-- ✅ Contenedor de la Tabla con Búsqueda -->
    <!-- 🧑‍💻 Campo de Búsqueda -->
    <div class="relative mb-4">
        <div class="posiciontablaalumno absolute top-0 right-0 p-2">
            <input type="search" id="searchInput" placeholder="Buscar Alumno..." class="buscador-input"
                style="width: 1110px; height: 10%; padding: 18px; background-color: #2d2d2d; color: white; border-radius: 5px;">
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
                             <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Materia
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 1
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 2
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 3
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 4
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 5
                            </th>
                            <th class="px-4 py-2 text-lg border-b border-red-500 animate-border text-center">Parcial 6
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($Calificaciones as $Calificacion)
                            <tr class="hover:bg-gray-800 bg-transparent">
                                <!-- Materia -->
                                <td class="px-4 py-2 border-t border-red-500 animate-border">
                                    {{ $Calificacion->NombreMateria }}</td>

                                <!-- PARCIALES - Editables -->
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial1[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial1 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial2[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial2 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial3[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial3 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial4[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial4 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial5[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial5 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                                <td class="px-4 py-2 border-t border-red-500 animate-border text-center">
                                    <input type="number" min="0" name="Parcial6[{{ $Calificacion->idCalificacion }}]"
                                        value="{{ $Calificacion->Parcial6 }}"
                                        class="bg-transparent text-white border-none w-full text-center" min="0"
                                        max="10" step="0.1">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ✅ Botón para enviar los datos -->
                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600 transition-all duration-200">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>


    @else
    <div class="sindatos">
        ⚠️ No se encontraron datos para mostrar.
    </div>
@endif
</x-docente.layout>
