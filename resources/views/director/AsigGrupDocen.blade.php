<x-director.layout>


    <form class="posiciontablas" action="{{ route('AsignarGrupDocente') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group ">
            <label for="Docente">Docente:</label>
            <select name="idDocente" id="Docente" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Docentes as $Docente)
                    <option value="{{ $Docente->idDocente }}">{{ $Docente->Nombre }} {{ $Docente->ApellidoPaterno }}
                        {{ $Docente->ApellidoMaterno }}</option>
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


                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre del docente</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupos a cargo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Desasignaciones</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($GrupDocen as $GrupDocen)
                        <tr class="hover:bg-gray-800 bg-transparent">


                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GrupDocen->NombreDocente }}
                                {{ $GrupDocen->ApellidoPaternoDocente }} {{ $GrupDocen->ApellidoMaternoDocente }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GrupDocen->NombreGrado }} {{ $GrupDocen->NivelAcademico }}
                                {{ $GrupDocen->Paquete }}</td>

                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/GruposAlumnos/{{ $GrupDocen->idGrupoDocente }}" method="GET">
                                    <button
                                        class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                    @endforeach
                    {{ $GrupDocen->links() }}
                </tbody>
            </table>
        </div>
    </div>

</x-director.layout>
