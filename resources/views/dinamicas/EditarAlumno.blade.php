<x-director.layout>
@if(!empty($Alumno) && $Alumno = null)
    <div class=" flex items-center  posiciontablas">

        <form class="formulario" action="{{ route('EditarAlumno') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $Alumno->Nombre }}"
                    required>
            </div>

            <div class="form-group">
                <label for="ApellidoPaterno">Apellido Paterno:</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ $Alumno->ApellidoPaterno }}"
                    required>
            </div>

            <div class="form-group">
                <label for="ApellidoMaterno">Apellido Materno:</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control"
                    value="{{ $Alumno->ApellidoMaterno }}" required>
            </div>

            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input type="text" name="CURP" id="CURP" class="form-control" value="{{ $Alumno->CURP }}"
                    required>
            </div>

            <div class="form-group">
                <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control"
                    value="{{ $Alumno->FechaNacimiento }}" required>
            </div>

            <div class="form-group">
                <label for="Genero">Género:</label>
                <select name="Genero" id="Genero" class="form-control" required>
                    <option value="{{ $Alumno->Genero }}">{{ $Alumno->Genero }}"</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Ciudad">Ciudad:</label>
                <input type="text" name="Ciudad" id="Ciudad" class="form-control" value="{{ $Alumno->Ciudad }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Municipio">Municipio:</label>
                <input type="text" name="Municipio" id="Municipio" class="form-control"
                    value="{{ $Alumno->Municipio }}" required>
            </div>

            <div class="form-group">
                <label for="CodigoPostal">Código Postal:</label>
                <input type="number" min="0" name="CodigoPostal" id="CodigoPostal" class="form-control"
                    value="{{ $Alumno->CodigoPostal }}" required>
            </div>

            <div class="form-group">
                <label for="ColFrac">Colonia/Fraccionamiento:</label>
                <input type="text" name="ColFrac" id="ColFrac" class="form-control" value="{{ $Alumno->ColFrac }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Calle">Calle:</label>
                <input type="text" name="Calle" id="Calle" class="form-control" value="{{ $Alumno->Calle }}"
                    required>
            </div>

            <div class="form-group">
                <label for="NumeroExterior">Número Exterior:</label>
                <input type="number" min="0" name="NumeroExterior" id="NumeroExterior" class="form-control"
                    value="{{ $Alumno->NumeroExterior }}" required>
            </div>

            <div class="form-group">
                <label for="EstadoCivil">Estado Civil:</label>
                <input type="text" name="EstadoCivil" id="EstadoCivil" class="form-control"
                    value="{{ $Alumno->EstadoCivil }}" required>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">Nacionalidad:</label>
                <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control"
                    value="{{ $Alumno->Nacionalidad }}" required>
            </div>
            <div class="form-group">
                <label for="EstadoActividad">Estado:</label>
                <input type="text" name="EstadoActividad" id="EstadoActividad" class="form-control"
                    value="{{ $Alumno->Estado }}" required>
            </div>

            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" name="Foto" id="Foto" class="form-control">
            </div>

            <!-- Datos de Alumno -->

            <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="Matricula" id="Matricula" class="form-control"
                    value="{{ $Alumno->Matricula }}" required>
            </div>

            <div class="form-group">
                <label for="EscuelaProcede">Escuela de Procedencia:</label>
                <input type="text" name="EscuelaProcede" id="EscuelaProcede" class="form-control"
                    value="{{ $Alumno->EscuelaProcede }}" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Editar Alumno</button>

            <div>
                <input type="hidden" name="id" value="{{ $Alumno->idAlumno }}">

            </div>
        </form>
    </div>
    @else
    <div class="sindatos">
        ⚠️ No se encontraron datos para mostrar.
    </div>
@endif
</x-director.layout>
