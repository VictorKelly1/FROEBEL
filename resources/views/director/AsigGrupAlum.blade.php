<x-director.layout>


<<<<<<< HEAD
<form class="" action="{{ route('AsignarGrupAlum') }}" method="POST" enctype="multipart/form-data">
@csrf


        <div class="form-group posicion1">
                        <label for="Alumno">Alumno:</label>
                        <select name="idAlumno" id="Alumno" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($Alumnos as $Alumno)
                                <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                            @endforeach
=======
    <form class="" action="{{ route('AsignarGrupAlum') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group posicion1">
            <label for="Alumno">Alumno:</label>
            <select name="idAlumno" id="Alumno" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Alumnos as $Alumno)
                    <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }}
                        {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group posicion2">
            <label for="Grupo">Grupo:</label>
            <select name="idGrupo" id="Grupo" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Grupos as $Grupo)
                    <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }}
                        {{ $Grupo->Paquete }}</option>
                @endforeach

            </select>
        </div>
>>>>>>> c9964c4e1b21f420cc2710960c2adf3ffc641f45

                        </select>
        </div>

<<<<<<< HEAD
        <div class="form-group posicion2">
                <label for="Grupo">Grupo:</label>
                      <select name="idGrupo" id="Grupo" class="form-control" required>
                             <option value="">Seleccione</option>
                    @foreach($Grupos as $Grupo)
                            <option value="{{ $Grupo->idGrupo }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                            
                    @endforeach

                      </select>
           </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary posicion2">Asignar</button>

</form>
            <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">                          
                <div class="overflow-x-auto">
                    <table class=" text-xs text-left text-white">
                        <thead>
                        <tr class="bg-transparent">
                           
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Matrícula</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Quitar Alumno</th>
                            </tr>
                        </thead>
                     <tbody id="tableBody">
                        @foreach($GrupAlum as $GruposAlum)
                        <tr class="hover:bg-gray-800 bg-transparent">
                        
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Matricula }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Nombre }} {{ $GruposAlum->ApellidoPaterno }} {{ $GruposAlum->ApellidoMaterno }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->NombreGrado }} {{ $GruposAlum->NivelAcademico }} {{ $GruposAlum->Paquete }}</td>

                        <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/GruposAlumnos/{{ $GruposAlum->idGrupoAlumno }}" method="GET">
                                    <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                        @endforeach
                    
                     </tbody>
                  </table>
               </div>
            </div>
=======
        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary posicion2">Asignar</button>

    </form>
    <div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">
        <div class="overflow-x-auto">
            <table class=" text-xs text-left text-white">
                <thead>
                    <tr class="bg-transparent">

                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Matrícula</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                        <th class="px-2 py-1 border-b border-purple-500 animate-border">Quitar Alumno</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($GrupAlum as $GruposAlum)
                        <tr class="hover:bg-gray-800 bg-transparent">

                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GruposAlum->Matricula }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Nombre }}
                                {{ $GruposAlum->ApellidoPaterno }} {{ $GruposAlum->ApellidoMaterno }}</td>
                            <td class="px-2 py-1 border-t border-purple-500 animate-border">
                                {{ $GruposAlum->NombreGrado }} {{ $GruposAlum->NivelAcademico }}
                                {{ $GruposAlum->Paquete }}</td>

                            <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/GruposAlumnos/{{ $GruposAlum->idGrupoAlumno }}" method="GET">
                                    <button
                                        class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Elimniar</button>
                                </form>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
>>>>>>> c9964c4e1b21f420cc2710960c2adf3ffc641f45

</x-director.layout>
