<x-director.layout>
    <div class="posiciontablas">
        <form action="{{ route('EditarDescuento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Campo oculto para enviar el ID del descuento -->
            <input type="hidden" name="idDescuento" value="{{ $Descuento->idDescuento }}">

            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $Descuento->Nombre }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Para">Para:</label>
                <select name="Para" id="Para" class="form-control" required>
                    <option value="{{ $Descuento->Para }}">{{ $Descuento->Para }}</option>
                    <option value="Ventas">Ventas</option>
                    <option value="Pagos">Pagos/Ingresos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <select name="Tipo" id="Tipo" class="form-control" required>
                    <option value="{{ $Descuento->Tipo }}">{{ $Descuento->Tipo }}</option>
                    <option value="Fijo">Fijo</option>
                    <option value="Porcentual">Porcentual</option>
                </select>
            </div>


            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="number" min="0" name="Monto" id="Monto" value="{{ $Descuento->Monto }}"
                    required>
            </div>





            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Editar Descuento</button>
        </form>
    </div>

</x-director.layout>
