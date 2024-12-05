<x-director.layout>






            <div class="form-group posicion1">
                <label for="Alumno">Alumno:</label>
                <select name="Alumno" id="Alumno" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach($Alumnos as $Alumno)
                         <option value="{{ $Alumno->Matricula }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                    @endforeach

                </select>
            </div>
     
            <div class="form-group posicion2">
                <label for="Grupo">Grupo:</label>
                      <select name="Grupo" id="Grupo" class="form-control" required>
                             <option value="">Seleccione</option>
                    @foreach($Grupos as $Grupo)
                            <option value="{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                            
                    @endforeach

                      </select>
           </div>

    <form action="/AsignarGrupAlum/{{ $Alumno->idAlumno }}/{{ $Grupo->idGrupo }}" method="POST">
           @csrf
           <button class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700 posicion2">Asignar</button> 
    </form>


                                
<div class="flex items-center justify-center bg-gray-900 p-2 posiciontablas borderAnimation ">                          
    <div class="overflow-x-auto">
        <table class=" text-xs text-left text-white">
            <thead>
            <tr class="bg-transparent">
                <th class="px-2 py-1 border-b border-purple-500 animate-border">#</th>
                <th class="px-2 py-1 border-b border-purple-500 animate-border">Matrícula</th>
                <th class="px-2 py-1 border-b border-purple-500 animate-border">Nombre Completo</th>
                <th class="px-2 py-1 border-b border-purple-500 animate-border">Grado</th>
                <th class="px-2 py-1 border-b border-purple-500 animate-border">Grupo</th>
                <th class="px-2 py-1 border-b border-purple-500 animate-border">Remover</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($GrupAlum as $GruposAlum)
            <tr class="hover:bg-gray-800 bg-transparent">
               
            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Matricula }}</td>
            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Nombre }} {{ $GruposAlum->ApellidoPaterno }} {{ $GruposAlum->ApellidoMaterno }}</td>
            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->NombreGrado }}</td>
            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->Paquete }}</td>
            <td class="px-2 py-1 border-t border-purple-500 animate-border">{{ $GruposAlum->NivelAcademico }}</td>
                   
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
</div>


</form>

<script>
    document.getElementById("asignarForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío inicial del formulario

        const alumnoId = document.getElementById("Alumno").value;
        const grupoId = document.getElementById("Grupo").value;

        // Valida que ambos campos estén seleccionados
        if (!alumnoId || !grupoId) {
            alert("Debe seleccionar un Alumno y un Grupo.");
            return;
        }

        // Actualiza la acción del formulario con la URL generada dinámicamente
        this.action = `/AsignarGrupAlum/${alumnoId}/${grupoId}`;
        this.submit(); // Envía el formulario con la nueva acción
    });
</script>


</x-director.layout>
