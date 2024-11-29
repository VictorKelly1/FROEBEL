<x-director.layout>


    <form action="" method="POST">
    @csrf



            <div class="form-group">
                <label for="Alumno">Alumno:</label>
                <select name="Alumno" id="Alumno" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach($Alumnos as $Alumno)
                         <option value="{{ $Alumno->Matricula }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }} {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                    @endforeach

                </select>
            </div>
     
            <div class="form-group">
                <label for="Grupo">Grupo:</label>
                      <select name="Grupo" id="Grupo" class="form-control" required>
                             <option value="">Seleccione</option>
                    @foreach($Grupos as $Grupo)
                            <option value="{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}">{{ $Grupo->NombreGrado }} {{ $Grupo->NivelAcademico }} {{ $Grupo->Paquete }}</option>
                            
                    @endforeach

                      </select>
           </div>


    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-2 text-left">#</th>
                <th class="border border-gray-300 p-2 text-left">Matrícula</th>
                <th class="border border-gray-300 p-2 text-left">Nombre Completo</th>
                <th class="border border-gray-300 p-2 text-left">Grupo</th>
                <th class="border border-gray-300 p-2 text-left">Remover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($GruposAlum as $GruposAlum)
            <tr>
                <td class="border border-gray-300 p-2">{{ $GruposAlum + 1 }}</td>
                <td class="border border-gray-300 p-2">{{ $GruposAlum->Matricula }}</td>
                <td class="border border-gray-300 p-2">{{ $GruposAlum->Nombre }} {{ $GruposAlum->ApellidoPaterno }} {{ $GruposAlum->ApellidoMaterno }}</td>
                <td class="border border-gray-300 p-2">{{ $GruposAlum->NombreGrado }}</td>
                <td class="border border-gray-300 p-2">{{ $GruposAlum->Paquete }}</td>
                <td class="border border-gray-300 p-2">{{ $GruposAlum->NivelAcademico }}</td>
                    <input 
                        type="checkbox" 
                        name="seleccionados[]" 
                        value="{{ $alumno->id }}" 
                        class="form-checkbox h-5 w-5 text-purple-600">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




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
