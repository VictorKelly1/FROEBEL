

<x-director.layout>

    <div class="container posicionsregisalum">

        <form action="{{ route('EditarGrupo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" name="id" value="{{ $Grupo->idGrupo }}">

            </div>
          
            <h3>Datos Del Grupo</h3>
            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" value="{{ $Grupo->Clave }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Paquete">Paquete:</label>
                <input type="text" name="Paquete" id="Paquete" value="{{ $Grupo->Paquete }}"
                    required>
            </div>

            <div class="form-group">
                <label for="NombreGrado">Grado:</label>
                <input type="number" name="NombreGrado" id="NombreGrado" class="form-control" value="{{ $Grupo->NombreGrado }}" 
                   required>
            </div>

            <div class="form-group">
                <label for="NivelAcademico">Nivel Academico:</label>
                <input type="text" name="NivelAcademico" id="NivelAcademico" class="form-control" value="{{ $Grupo->NivelAcademico }}"
                    required>
            </div>

            <div class="form-group">
                <label for="FechaInicio">Fecha de Inicio:</label>
                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control"
                    value="{{ $Grupo->FechaInicio }}" required>
            </div>

            <div class="form-group">
                <label for="FechaFin">Fecha de Fin:</label>
                <input type="date" name="FechaFin" id="FechaFin" class="form-control"
                    value="{{ $Grupo->FechaFin }}" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <select name="Tipo" id="Tipo" class="form-control" required>
                    <option value="{{ $Grupo->Tipo }}">{{ $Grupo->Tipo }}"</option>
                    <option value="Regular">Regular</option>
                    <option value="Extraescolar">Extraescolar</option>
                    <option value="Verano">Verano</option>
                </select>
            </div>

          

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Editar Grupo</button>
        </form>
    </div>

</x-director.layout>
