<x-director.layout>
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <div class=" flex items-center posicionregisdesc">

        <form class="formulario1x1" action="{{ route('RegistrarCompra') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label for="Cantidad">Cantidad:</label>
                <input type="text" name="Cantidad" id="Cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="text" name="Monto" id="Monto" class="form-control" required>
            </div>

            <div class="form-group ">
                <label for="Concepto">Concepto:</label>
                <select name="idConcepto" id="Concepto" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Conceptos as $Concepto)
                        <option value="{{ $Concepto->idConcepto }}">
                            {{ $Concepto->Nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="MetodoPago">MetodoPago:</label>
                <input type="text" name="MetodoPago" id="MetodoPago" class="form-control" required>
            </div>






            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Compra</button>
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
