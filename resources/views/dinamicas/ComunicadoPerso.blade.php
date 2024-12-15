
<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">

        <form class="" action="{{ route('ComunicadoPersonal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Datos -->
            <h3>Datos</h3>







            <div class="form-group">
                <label for="ComunicadoPersonal">Comunicado:</label>
                <input type="text" name="ComunicadoPersonal" id="ComunicadoPersonal" class="form-control" required>
            </div>




             <!-- Botón de envío -->
             <button type="submit" class="btn btn-primary">Enviar Comunicado</button>
        </form>
    </div>

</x-director.layout>
