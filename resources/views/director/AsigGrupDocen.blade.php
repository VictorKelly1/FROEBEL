<x-director.layout>


<form class="" action="{{ route('AsignarGrupDocen') }}" method="POST" enctype="multipart/form-data">
@csrf


        <div class="form-group posicion1">
                        <label for="Docente">Docente:</label>
                        <select name="idDocente" id="Docente" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($Docentes as $Docente)
                                <option value="{{ $Docente->idDocente }}">{{ $Docente->Nombre }} {{ $Docente->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                            @endforeach

                        </select>
        </div>

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
                           
                           
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                            <th class="px-2 py-1 border-b border-purple-500 animate-border">Quitar Alumno</th>
                            </tr>
                        </thead>
                     <tbody id="tableBody">
                        @foreach($GrupDocen as $GrupDocen)
                        <tr class="hover:bg-gray-800 bg-transparent">
                        
                        
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GrupDocen->Nombre }} {{ $GrupDocen->ApellidoPaterno }} {{ $GrupDocen->ApellidoMaterno }}</td>
                        <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GrupDocen->NombreGrado }} {{ $GrupDocen->NivelAcademico }} {{ $GrupDocen->Paquete }}</td>

                        <td class="px-2 py-1 border-t border-purple-500 animate-border text-center">
                                <form action="/GruposAlumnos/{{ $GrupDocen->idGrupoDocente }}" method="GET">
                                    <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Eliminar</button>
                                </form>

                        </tr>
                        @endforeach
                    
                     </tbody>
                  </table>
               </div>
            </div>

</x-director.layout>
