<x-director.layout>
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
<div class=" flex items-center posicionregisdesc ">
      
    <form class="formulario1x1" action="{{ route('RegistrarMateria') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <!-- Datos de Materia -->
        

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NombreMateria">Materia:</label>
                <input type="text" name="NombreMateria" id="NombreMateria" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input  type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Materia</button>
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