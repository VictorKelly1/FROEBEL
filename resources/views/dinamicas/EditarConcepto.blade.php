
<x-director.layout>

        <div class="posiciontablas">

            <form action="{{ route('EditarConcepto') }}" method="POST" enctype="multipart/form-data">
                @csrf
       

             
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control"
                        value="{{ $Conceptos->Nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input type="text" name="Descripcion" id="Descripcion" class="form-control"
                        value="{{ $Conceptos->Descripcion }}" required>
                </div>

                <div class="form-group">
                    <label for="Para">Para:</label>
                    <input type="text" name="Para" id="Para" class="form-control"
                        value="{{ $Conceptos->Para }}" required>
                </div>

                <div class="form-group">
                    <label for="Monto">Monto:</label>
                    <input type="number" min="0" name="Monto" id="Monto" value="{{ $Descuento->Monto }}" required>
                </div>


                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary">Editar Concepto</button>
            </form>
        </div>


</x-director.layout>
