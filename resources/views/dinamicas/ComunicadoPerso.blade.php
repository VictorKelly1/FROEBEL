
<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">

        <form class="" action="{{ route('ComunicadoPersonal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Datos -->
            <h3>Datos</h3>
            <div class="form-group">
                <label for="Titulo">Titulo:</label>
                <input type="text" name="Titulo" id="Titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Archivo">Archivo:</label>
                <input type="file" name="Archivo" id="Archivo" class="form-control">
            </div>

            <div class="form-control form-control-lg">
                <label for="ComunicadoPersonal">Comunicado:</label>
                <textarea name="ComunicadoPersonal" id="ComunicadoPersonal" class="form-control" rows="7" required></textarea>
            </div>
             <!-- Botón de envío -->
             <button type="submit" class="btn btn-primary">Enviar Comunicado</button>
        </form>
    </div>

</x-director.layout>
