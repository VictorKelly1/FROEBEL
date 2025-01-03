<x-director.layout>

    <!-- ✅ Formulario de Asignación -->
    <form class="posiciontablas bg-gray-900 p-2 rounded-md border border-blue-500 shadow-md w-full max-w-xs mx-auto" 
          action="{{ route('AsignarTutoresAlum') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Alumno -->
        <label for="Alumno" class="block text-sm font-medium text-white mb-1">Alumno:</label>
        <select name="idAlumno" id="Alumno" class="form-control w-full p-1 mb-2 rounded-md text-sm" required>
            <option value="">Seleccione</option>
            @foreach ($Alumnos as $Alumno)
                <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
            @endforeach
        </select>

        <!-- Tutor -->
        <label for="Tutor" class="block text-sm font-medium text-white mb-1">Tutor:</label>
        <select name="idTutor" id="Tutor" class="form-control w-full p-1 mb-2 rounded-md text-sm" required>
            <option value="">Seleccione</option>
            @foreach ($Tutores as $Tutor)
                <option value="{{ $Tutor->idTutor }}">{{ $Tutor->Nombre }} {{ $Tutor->ApellidoPaterno }} {{ $Tutor->ApellidoMaterno }}</option>
            @endforeach
        </select>

        <!-- Parentesco -->
        <label for="Tipo" class="block text-sm font-medium text-white mb-1">Parentesco:</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control w-full p-1 mb-2 rounded-md text-sm" required>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-4 py-1 rounded-md hover:bg-blue-700 w-full mt-2">
            Asignar
        </button>
    </form>

    <!-- ✅ Tabla de Asignaciones -->
    <div class="posiciontablasbaja flex items-center justify-center bg-gray-900 p-2 mt-2 rounded-md border border-blue-500 shadow-md w-3/4 md:w-1/2 lg:w-1/3 overflow-x-auto">
        <table class="w-full text-xs text-white border-collapse border border-blue-500 rounded-md">
            <thead class="bg-blue-700 text-center">
                <thead>
                    <tr>
                    <th class="px-1 py-1 border-b border-blue-500">Matrícula</th>
                    <th class="px-1 py-1 border-b border-blue-500">Nombre del Alumno</th>
                    <th class="px-1 py-1 border-b border-blue-500">Nombre del Tutor</th>
                    <th class="px-1 py-1 border-b border-blue-500">Parentesco</th>
                    <th class="px-1 py-1 border-b border-blue-500">Desasignación</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($AlumTutor as $AlumnoTutor)
                    <tr class="hover:bg-gray-800 text-center">
                    <td class="px-1 py-1 border-t border-blue-500">{{ $AlumnoTutor->Matricula }}</td>
                    <td class="px-1 py-1 border-t border-blue-500">{{ $AlumnoTutor->NombreAlum }} {{ $AlumnoTutor->ApellidoPatA }} {{ $AlumnoTutor->ApellidoMatA }}</td>
                    <td class="px-1 py-1 border-t border-blue-500">{{ $AlumnoTutor->NombreTutor }} {{ $AlumnoTutor->ApellidoPaternoT }} {{ $AlumnoTutor->ApellidoMatT }}</td>
                    <td class="px-1 py-1 border-t border-blue-500">{{ $AlumnoTutor->Tipo }}</td>
                    <td class="px-1 py-1 border-t border-blue-500">
                                <form action="/AlumTutor/{{ $AlumnoTutor->idAlumnoTutor }}" method="GET">
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Desasignar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ✅ Paginación -->
    <div class="mt-2 text-xs text-center">
        {{ $AlumTutor->links() }}
    </div>

</x-director.layout>
