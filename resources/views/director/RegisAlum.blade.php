<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    <div class="flex items-center posiciontablas">
        <form class="formulario" action="{{ route('RegistrarAlumno') }}" method="POST" enctype="multipart/form-data" onsubmit="return handleFormSubmit(event)">
            @csrf

            <!-- Datos de Persona -->
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input placeholder=" Nombre(s) del Alumno ..." type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ApellidoPaterno">Apellido Paterno:</label>
                <input placeholder=" Apellido Paterno del Alumno ..." type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ApellidoMaterno">Apellido Materno:</label>
                <input placeholder=" Apellido Materno del Alumno ..." type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input placeholder="XXXXXXXXXXXXXXXXXX" type="text" name="CURP" id="CURP" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="FechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control" required>
            </div>

            <div class="form-control p-4 mb-4 rounded-md text-lg">
                <label for="Genero">Género:</label>
                <select type="select" name="Genero" id="Genero" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Ciudad">Ciudad:</label>
                <input placeholder="Ciudad" type="text" name="Ciudad" id="Ciudad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Municipio">Municipio:</label>
                <input placeholder="Municipio/Ciudad" type="text" name="Municipio" id="Municipio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="CodigoPostal">Código Postal:</label>
                <input placeholder="Ejemp.- 34424" type="text" name="CodigoPostal" id="CodigoPostal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ColFrac">Colonia/Fraccionamiento:</label>
                <input placeholder="Colonia donde vive actualmente" type="text" name="ColFrac" id="ColFrac" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Calle">Calle:</label>
                <input placeholder="Calle" type="text" name="Calle" id="Calle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NumeroExterior">Número Exterior:</label>
                <input placeholder="Ejemp.- 1002" type="text" name="NumeroExterior" id="NumeroExterior" class="form-control" required>
            </div>

            <div class="form-control p-4 mb-4 rounded-md text-lg">
                <label for="EstadoCivil">Estado Civil:</label>
                <select type="select" name="EstadoCivil" id="EstadoCivil" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Casado">Casado</option>
                    <option value="Soltero">Soltero</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Nacionalidad">Nacionalidad:</label>
                <input placeholder="Nacionalidad" type="text" name="Nacionalidad" id="Nacionalidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" name="Foto" id="Foto" class="form-control">
                <!-- Input oculto para la foto por defecto -->
                <input type="hidden" name="FotoDefault" id="FotoDefault" value="/images/default.jpg">
            </div>

            <!-- Datos de Usuario -->
            <div class="form-group">
                <label for="Correo">Correo Electrónico:</label>
                <input placeholder="Correo del Alumno" type="email" name="Correo" id="Correo" class="form-control" required>
            </div>

            <!-- Datos de Alumno -->
            <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input placeholder="Matricula" type="text" name="Matricula" id="Matricula" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="EscuelaProcede">Escuela de Procedencia:</label>
                <input placeholder="Ultima Escuela con Registro" type="text" name="EscuelaProcede" id="EscuelaProcede" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Alumno</button>
        </form>
    </div>

    <script>
        // Función para manejar el envío del formulario
        function handleFormSubmit(event) {
            const fotoInput = document.getElementById('Foto');
            const fotoDefaultInput = document.getElementById('FotoDefault');

            // Si no se selecciona una foto, se asigna la foto por defecto
            if (!fotoInput.files || fotoInput.files.length === 0) {
                // Crear un objeto File desde la foto por defecto
                fetch(fotoDefaultInput.value)
                    .then(response => response.blob())
                    .then(blob => {
                        const file = new File([blob], 'default.jpg', { type: 'image/jpeg' });
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        fotoInput.files = dataTransfer.files;
                    })
                    .catch(error => console.error('Error al cargar la foto por defecto:', error));
            }

            // Continuar con el envío del formulario
            return true;
        }

        // Mostrar alerta
        document.querySelector('.alert')?.classList.add('show');

        // Después de 5 segundos, aplicar la clase de desvanecimiento y eliminarla
        setTimeout(() => {
            let alertElement = document.querySelector('.alert');
            if (alertElement) {
                alertElement.classList.add('fade-out');

                // Esperar el final de la animación para eliminar el elemento del DOM
                setTimeout(() => {
                    alertElement.remove();
                }, 1000); // Aseguramos que la animación de desvanecimiento termine antes de eliminarla
            }
        }, 5000); // 5 segundos de espera
    </script>
</x-director.layout>