<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">
      
        <form>
            @csrf

            <!-- Datos de Aula -->
            <h3>Datos</h3>

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Capacidad">Capacidad:</label>
                <input type="number" name="Capacidad" id="Capacidad" class="form-control" required>
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