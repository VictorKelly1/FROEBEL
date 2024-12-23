<x-director.layout>


    <form class="" action="{{ route('AsignarHorario') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group posicion1">
            <label for="Aula">Aula:</label>
            <select name="idAula" id="Aula" class="form-control" required>
                <option value="">Selecciona Aula</option>
                @foreach ($Aulas as $Aula)
                    <option value="{{ $Aula->idAula }}">{{ $Aula->Nombre }} - Piso: {{ $Aula->Piso }} </option>
                @endforeach

            </select>
        </div>

        <div class="form-group posicion2">
            <label for="GrupoMat">GrupoMat:</label>
            <select name="idGrupoMat" id="GrupoMat" class="form-control" required>
                <option value="">Selecciona materia y grupo</option>
                @foreach ($GrupMat as $GrupoMat)
                    <option value="{{ $GrupoMat->IdGrupoMateria }}">
                        {{ $GrupoMat->NombreMateria }}
                        {{ $GrupoMat->NombreGrado }}
                        {{ $GrupoMat->NivelAcademico }}
                        {{ $GrupoMat->Paquete }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="Lunes">Lunes:</label>
            <input type="text" name="HoraL" id="Lunes" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Martes">Martes:</label>
            <input type="text" name="HoraM" id="Martes" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Miercoles">Miercoles:</label>
            <input type="text" name="HoraMi" id="Miercoles" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Jueves">Jueves:</label>
            <input type="text" name="HoraJ" id="Jueves" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Viernes">Viernes:</label>
            <input type="text" name="HoraV" id="Viernes" class="form-control" required>
        </div>


        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary posicion2">Asignar</button>

    </form>

    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">

                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Aula</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Materia</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Lunes</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Martes</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Miercoles</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Jueves</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Viernes</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Quitar Materia</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($Horarios as $Horario)
                        <tr class="hover:bg-gray-800 bg-transparent">

                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->NombreAula }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->NombreMateria }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->HoraL }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->HoraM }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->HoraMi }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->HoraJ }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $Horario->HoraV }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/Horario/{{ $Horario->idHorario }}" method="GET">
                                    <button
                                        class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                    @endforeach
                    {{ $Horarios->links() }}
                </tbody>
            </table>
        </div>
    </div>

</x-director.layout>
