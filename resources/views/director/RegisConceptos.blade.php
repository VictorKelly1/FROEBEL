<x-director.layout>




<x-director.layout>

    <div class=" flex items-center posiciontablas">


        <form class="formulario" action="{{ route('RegistrarConceptos') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
         
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Descripcion">Descripcion:</label>
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Para">Tipo:</label>
                <input type="text" name="Para" id="Para" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Concepto</button>
        </form>
    </div>

</x-director.layout>
















</x-director.layout>
