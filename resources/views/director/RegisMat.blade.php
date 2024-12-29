<x-director.layout>

    <div class=" flex items-center posiciontablas">
      
    <form class="formulario" action="{{ route('RegistrarMateria') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <!-- Datos de Materia -->
        

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="NombreMateria">Nombre de Materia:</label>
                <input type="text" name="NombreMateria" id="NombreMateria" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Materia</button>
        </form>
    </div>

</x-director.layout>