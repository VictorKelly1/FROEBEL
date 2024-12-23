<x-director.layout>


    <form class="posiciontablas" action="{{ route('AsignarGrupMateria') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group ">
            <label for="Materia">Materia:</label>
            <select name="idMateria" id="Materia" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Materias as $Materia)
                    <option value="{{ $Materia->idMateria }}">{{ $Materia->Clave }} - {{ $Materia->NombreMateria }}
                        {{ $Materia->Tipo }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group ">
            <label for="Grupo">Grupo:</label>
            <select name="idGrupo" id="Grupo" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Grupos as $Grupo)
                    <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }}
                        {{ $Grupo->Paquete }}</option>
                @endforeach

            </select>
        </div>


        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary posicion2">Asignar</button>

    </form>
    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablasasig borderAnimation ">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">

                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Clave</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Quitar Materia</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($GrupMat as $GruposMat)
                        <tr class="hover:bg-gray-800 bg-transparent">

                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GruposMat->Clave }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GruposMat->NombreMateria }} {{ $GruposMat->Tipo }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GruposMat->NombreGrado }} {{ $GruposMat->NivelAcademico }}
                                {{ $GruposMat->Paquete }}</td>

                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/GruposMaterias/{{ $GruposMat->idGrupoMateria }}" method="GET">
                                    <button
                                        class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-director.layout>
