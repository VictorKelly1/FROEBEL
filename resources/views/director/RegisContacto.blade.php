<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">


        <form class="" action="{{ route('RegistrarContacto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
            <h3>Datos Personales</h3>


            <div class="form-group">
                <label for="TipoContacto">TipoContacto:</label>
                <input type="text" name="TipoContacto" id="TipoContacto" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ApellidoPaterno">Apellido Paterno:</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ApellidoMaterno">Apellido Materno:</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input type="text" name="CURP" id="CURP" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Genero">Género:</label>
                <select name="Genero" id="Genero" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Ciudad">Ciudad:</label>
                <input type="text" name="Ciudad" id="Ciudad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Municipio">Municipio:</label>
                <input type="text" name="Municipio" id="Municipio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="CodigoPostal">Código Postal:</label>
                <input type="text" name="CodigoPostal" id="CodigoPostal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ColFrac">Colonia/Fraccionamiento:</label>
                <input type="text" name="ColFrac" id="ColFrac" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Calle">Calle:</label>
                <input type="text" name="Calle" id="Calle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NumeroExterior">Número Exterior:</label>
                <input type="text" name="NumeroExterior" id="NumeroExterior" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="EstadoCivil">Estado Civil:</label>
                <select name="EstadoCivil" id="EstadoCivil" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">Nacionalidad:</label>
                <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" name="Foto" id="Foto" class="form-control">
            </div>

            <div class="form-group">
                <label for="NoINE">NoINE:</label>
                <input type="number" name="NoINE" id="NoINE" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="RFC">RFC:</label>
                <input type="text" name="RFC" id="RFC" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="LugarTrabajo">Lugar de Trabajo:</label>
                <input type="text" name="LugarTrabajo" id="LugarTrabajo" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Contacto</button>
        </form>
    </div>

</x-director.layout>