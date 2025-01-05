<x-director.layout>
    <!-- ✅ Mensaje de Éxito -->
    @if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <div class=" flex items-center posicionregisdesc ">

        <form class="formulario1x2" action="{{ route('RegistrarAula') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Aula -->

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Capacidad">Capacidad:</label>
                <input type="number" min="0" name="Capacidad" id="Capacidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Edificio">Edificio:</label>
                <input type="text" name="Edificio" id="Edificio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Piso">Piso:</label>
                <input type="text" name="Piso" id="Piso" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Aula</button>
        </form>
    </div>





    <script>
        // Mostrar alerta
        document.querySelector('.alert').classList.add('show');

        // Después de 5 segundos, aplicar la clase de desvanecimiento y eliminarla
        setTimeout(() => {
            let alertElement = document.querySelector('.alert');
            alertElement.classList.add('fade-out');

            // Esperar el final de la animación para eliminar el elemento del DOM
            setTimeout(() => {
                alertElement.remove();
            }, 1000); // Aseguramos que la animación de desvanecimiento termine antes de eliminarla
        }, 5000); // 5 segundos de espera
    </script>



</x-director.layout>
