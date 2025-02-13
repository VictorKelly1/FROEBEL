<x-director.layout>
    @if (!empty($Coordinador))
    <div class=" flex items-center  posiciontablas">

            <form class="formulario" action="{{ route('EditarCoordi') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Datos de Persona -->
           
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control"
                        value="{{ $Coordinador->Nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="ApellidoPaterno">Apellido Paterno:</label>
                    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno"
                        value="{{ $Coordinador->ApellidoPaterno }}" required>
                </div>

                <div class="form-group">
                    <label for="ApellidoMaterno">Apellido Materno:</label>
                    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control"
                        value="{{ $Coordinador->ApellidoMaterno }}" required>
                </div>

                <div class="form-group">
                    <label for="CURP">CURP:</label>
                    <input type="text" name="CURP" id="CURP" class="form-control"
                        value="{{ $Coordinador->CURP }}" required>
                </div>

                <div class="form-group">
                    <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control"
                        value="{{ $Coordinador->FechaNacimiento }}" required>
                </div>

                <div class="form-group">
                    <label for="Genero">Género:</label>
                    <select name="Genero" id="Genero" class="form-control" required>
                        <option value="{{ $Coordinador->Genero }}">{{ $Coordinador->Genero }}"</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Ciudad">Ciudad:</label>
                    <input type="text" name="Ciudad" id="Ciudad" class="form-control"
                        value="{{ $Coordinador->Ciudad }}" required>
                </div>

                <div class="form-group">
                    <label for="Municipio">Municipio:</label>
                    <input type="text" name="Municipio" id="Municipio" class="form-control"
                        value="{{ $Coordinador->Municipio }}" required>
                </div>

                <div class="form-group">
                    <label for="CodigoPostal">Código Postal:</label>
                    <input type="number" min="0" name="CodigoPostal" id="CodigoPostal" class="form-control"
                        value="{{ $Coordinador->CodigoPostal }}" required>
                </div>

                <div class="form-group">
                    <label for="ColFrac">Colonia/Fraccionamiento:</label>
                    <input type="text" name="ColFrac" id="ColFrac" class="form-control"
                        value="{{ $Coordinador->ColFrac }}" required>
                </div>

                <div class="form-group">
                    <label for="Calle">Calle:</label>
                    <input type="text" name="Calle" id="Calle" class="form-control"
                        value="{{ $Coordinador->Calle }}" required>
                </div>

                <div class="form-group">
                    <label for="NumeroExterior">Número Exterior:</label>
                    <input type="number" min="0" name="NumeroExterior" id="NumeroExterior" class="form-control"
                        value="{{ $Coordinador->NumeroExterior }}" required>
                </div>

                <div class="form-group">
                    <label for="EstadoCivil">Estado Civil:</label>
                    <input type="text" name="EstadoCivil" id="EstadoCivil" class="form-control"
                        value="{{ $Coordinador->EstadoCivil }}" required>
                </div>

                <div class="form-group">
                    <label for="Nacionalidad">Nacionalidad:</label>
                    <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control"
                        value="{{ $Coordinador->Nacionalidad }}" required>
                </div>

                <div class="form-group">
                    <label for="Foto">Foto:</label>
                    <input type="file" name="Foto" id="Foto" class="form-control"
                        value="{{ $Coordinador->Foto }}" required>
                </div>

                <div class="form-group">
                    <label for="EstadoActividad">Estado:</label>
                    <input type="text" name="EstadoActividad" id="EstadoActividad" class="form-control"
                        value="{{ $Coordinador->Estado }}" required>
                </div>

                <div class="form-group">
                    <label for="RFC">RFC:</label>
                    <input type="text" name="RFC" id="RFC" class="form-control"
                        value="{{ $Coordinador->RFC }}" required>
                </div>

                <div class="form-group">
                    <label for="NoINE">NoINE:</label>
                    <input type="text" name="NoINE" id="NoINE" class="form-control"
                        value="{{ $Coordinador->NoINE }}" required>
                </div>

                <div class="form-group">
                    <label for="Sueldo">Sueldo:</label>
                    <input type="number" name="Sueldo" id="Sueldo" class="form-control"
                        value="{{ $Coordinador->Sueldo }}" required>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary">Editar Coordinador</button>

                <div>
                    <input type="hidden" name="id" value="{{ $Coordinador->idCoordinador }}">

                </div>
            </form>
        </div>
    @else
        <div class="sindatos">
            ⚠️ No se encontraron datos para mostrar.
        </div>
    @endif

</x-director.layout>
