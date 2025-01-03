<x-director.layout>




<x-director.layout>

    <div class=" flex items-center posiciontablas">


        <form class="formulario" action="{{ route('RegistrarDescuento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Datos de Persona -->
         
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Para">Para:</label>
                <input type="text" name="Para" id="Para" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="number" name="Monto" id="Monto" class="form-control" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Descuento</button>
        </form>
    </div>

</x-director.layout>
















</x-director.layout>
