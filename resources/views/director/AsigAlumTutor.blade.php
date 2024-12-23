<x-director.layout>


    <form class="posiciontablas" action="{{ route('AsignarTutoresAlum') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <label for="Alumno">Alumno:</label>
            <select name="idAlumno" id="Alumno" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Alumnos as $Alumno)
                    <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }}
                        {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                @endforeach

            </select>
        

 
            <label for="Tutor">Tutor:</label>
            <select name="idTutor" id="Tutor" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Tutores as $Tutor)
                    <option value="{{ $Tutor->idTutor }}">{{ $Tutor->Nombre }} {{ $Tutor->ApellidoPaterno }}
                        {{ $Tutor->ApellidoMaterno }}</option>
                @endforeach

            </select>
        

    
                <label for="Tipo">Parentesco:</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" required>
           
             <!-- Botón de envío -->
              <button type="submit" class="btn btn-primary ">Asignar</button>
   </form>     

<div class="flex items-center justify-center bg-gray-900 p-2 posiciontablasasig borderAnimation ">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">

                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Matrícula</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre del Alumno</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre del Tutor</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Parentesco</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Desasignacion</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($AlumTutor as $AlumnoTutor)
                        <tr class="hover:bg-gray-800 bg-transparent">

                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $AlumnoTutor->Matricula }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $AlumnoTutor->NombreAlum }}
                                {{ $AlumnoTutor->ApellidoPatA }} {{ $AlumnoTutor->ApellidoMatA }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $AlumnoTutor->NombreTutor }} {{ $AlumnoTutor->ApellidoPaternoT }}
                                {{ $AlumnoTutor->ApellidoMatT }}</td>
                                <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $AlumnoTutor->Tipo }} </td>

                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/AlumTutor/{{ $AlumnoTutor->idAlumnoTutor }}" method="GET">
                                    <button
                                        class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Desasignar</button>
                                </form>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>










</x-director.layout>
