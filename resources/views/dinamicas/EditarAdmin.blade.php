

<x-director.layout>

    <div class="container posicionsregisalum">

        <form action="{{ route('EditarAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" name="id" value="{{ $Administrador->idAdministrador }}">

            </div>
            <!-- Datos de Persona -->
            <h3>Datos Personales</h3>
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $Administrador->Nombre }}"
                    required>
            </div>

            <div class="form-group">
                <label for="ApellidoPaterno">Apellido Paterno:</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ $Administrador->ApellidoPaterno }}"
                    required>
            </div>

            <div class="form-group">
                <label for="ApellidoMaterno">Apellido Materno:</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control"
                    value="{{ $Administrador->ApellidoMaterno }}" required>
            </div>

            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input type="text" name="CURP" id="CURP" class="form-control" value="{{ $Administrador->CURP }}"
                    required>
            </div>

            <div class="form-group">
                <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control"
                    value="{{ $Administrador->FechaNacimiento }}" required>
            </div>

            <div class="form-group">
                <label for="Genero">Género:</label>
                <select name="Genero" id="Genero" class="form-control" required>
                    <option value="{{ $Administrador->Genero }}">{{ $Coordinador->Genero }}"</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Ciudad">Ciudad:</label>
                <input type="text" name="Ciudad" id="Ciudad" class="form-control" value="{{ $Administrador->Ciudad }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Municipio">Municipio:</label>
                <input type="text" name="Municipio" id="Municipio" class="form-control"
                    value="{{ $Administrador->Municipio }}" required>
            </div>

            <div class="form-group">
                <label for="CodigoPostal">Código Postal:</label>
                <input type="number" name="CodigoPostal" id="CodigoPostal" class="form-control"
                    value="{{ $Administrador->CodigoPostal }}" required>
            </div>

            <div class="form-group">
                <label for="ColFrac">Colonia/Fraccionamiento:</label>
                <input type="text" name="ColFrac" id="ColFrac" class="form-control" value="{{ $Administrador->ColFrac }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Calle">Calle:</label>
                <input type="text" name="Calle" id="Calle" class="form-control" value="{{ $Administrador->Calle }}"
                    required>
            </div>

            <div class="form-group">
                <label for="NumeroExterior">Número Exterior:</label>
                <input type="number" name="NumeroExterior" id="NumeroExterior" class="form-control"
                    value="{{ $Administrador->NumeroExterior }}" required>
            </div>

            <div class="form-group">
                <label for="EstadoCivil">Estado Civil:</label>
                <input type="text" name="EstadoCivil" id="EstadoCivil" class="form-control"
                    value="{{ $Administrador->EstadoCivil }}" required>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">Nacionalidad:</label>
                <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control"
                    value="{{ $Administrador->Nacionalidad }}" required>
            </div>

            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" name="Foto" id="Foto" class="form-control"
                    value="{{ $Administrador->Foto }}" required>
            </div>

            <div class="form-group">
                <label for="EstadoActividad">Estado:</label>
                <input type="text" name="EstadoActividad" id="EstadoActividad" class="form-control"
                    value="{{ $Administrador->Estado }}" required>
            </div>

            <div class="form-group">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" id="RFC" class="form-control"
                    value="{{ $Administrador->RFC }}" required>
            </div>

            <div class="form-group">
                <label for="NoINE">NoINE:</label>
                <input type="text" name="NoINE" id="NoINE" class="form-control"
                    value="{{ $Administrador->NoINE }}" required>
            </div>

            <div class="form-group">
                <label for="Sueldo">Sueldo:</label>
                <input type="number" name="Sueldo" id="Sueldo" class="form-control"
                    value="{{ $Administrador->Sueldo }}" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Editar Administrador</button>
        </form>
    </div>

</x-director.layout>
