<x-director.layout>

    <div class=" flex items-center posiciontablas ">

 
        <form class="formulario" action="{{ route('RegistrarAlumno') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
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
                <select type="select" name="Genero" id="Genero" class="form-control" required>
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
                <input type="text" name="EstadoCivil" id="EstadoCivil" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">Nacionalidad:</label>
                <input type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" name="Foto" id="Foto" class="form-control">
            </div>

            <!-- Datos de Usuario -->
  
            <div class="form-group">
                <label for="Correo">Correo Electrónico:</label>
                <input type="email" name="Correo" id="Correo" class="form-control" required>
            </div>

            <!-- Datos de Alumno -->
      
            <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="Matricula" id="Matricula" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="EscuelaProcede">Escuela de Procedencia:</label>
                <input type="text" name="EscuelaProcede" id="EscuelaProcede" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Alumno</button>
        </form>
    </div>





</x-director.layout>
