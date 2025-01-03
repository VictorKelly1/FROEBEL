<x-director.layout>

    <!-- ✅ Formulario Compacto para Asignación de Materia a Grupo -->
    <div class="posiciontablasmedia flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-1/3">
        <form class="w-full text-white text-xs" action="{{ route('AsignarGrupMateria') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 📖 Materia -->
            <div class="mb-2">
                <label for="Materia" class="block mb-1 text-sm">Materia:</label>
                <select name="idMateria" id="Materia" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    @foreach ($Materias as $Materia)
                        <option value="{{ $Materia->idMateria }}">{{ $Materia->Clave }} - {{ $Materia->NombreMateria }} {{ $Materia->Tipo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 📚 Grupo -->
            <div class="mb-2">
                <label for="Grupo" class="block mb-1 text-sm">Grupo:</label>
                <select name="idGrupo" id="Grupo" class="w-full px-2 py-1 rounded-md bg-gray-800 border border-blue-500 text-white" required>
                    <option value="">Seleccione</option>
                    @foreach ($Grupos as $Grupo)
                        <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                    @endforeach
                </select>
            </div>

            <!-- ✅ Botón de Envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 rounded-md">
                Asignar
            </button>
        </form>
    </div>

    <!-- ✅ Tabla Compacta con Diseño Original -->
    <div class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-4 mt-4 rounded-md border border-blue-500 shadow-md w-3/4 sm:w-1/2 lg:w-1/3 overflow-x-auto">
        <table class="w-full text-xs text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <tr>
                    <th class="px-2 py-1 border-b border-blue-500">Clave</th>
                    <th class="px-2 py-1 border-b border-blue-500">Nombre</th>
                    <th class="px-2 py-1 border-b border-blue-500">Grupo</th>
                    <th class="px-2 py-1 border-b border-blue-500">Quitar Materia</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($GrupMat as $GruposMat)
                    <tr class="hover:bg-gray-800 text-center">
                        <td class="px-2 py-1 border-t border-blue-500">
                            {{ $GruposMat->Clave }}
                        </td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            {{ $GruposMat->NombreMateria }} {{ $GruposMat->Tipo }}
                        </td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            {{ $GruposMat->NombreGrado }} {{ $GruposMat->NivelAcademico }} {{ $GruposMat->Paquete }}
                        </td>
                        <td class="px-2 py-1 border-t border-blue-500">
                            <form action="/GruposMaterias/{{ $GruposMat->idGrupoMateria }}" method="GET">
                                <button class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-1 text-xs text-center text-white">
        {{ $GrupMat->links() }}
    </div>

</x-director.layout>
