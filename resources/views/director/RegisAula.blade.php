<x-director.layout>

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









</x-director.layout>
