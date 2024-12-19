<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">
      
        <form>
            @csrf

            <!-- Datos de Aula -->
            <h3>Datos</h3>

            <div class="form-group">
                <label for="Clave">Clave:</label>
                <input type="text" name="Clave" id="Clave" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Cantidad">Cantidad:</label>
                <input type="text" name="Cantidad" id="Cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="text" name="Monto" id="Monto" class="form-control" required>
            </div>

            <div class="form-group posicion2">
                <label for="Concepto">Concepto:</label>
                <select name="idConcepto" id="Concepto" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Conceptos as $Concepto)
                        <option value="{{ $Conceptos->idConcepto }}">
                            {{ $Concepto->Nombre }}
                        </option>
                    @endforeach

                </select>
            </div>
           
            <div class="form-group">
                <label for="MetodoPago">MetodoPago:</label>
                <input type="text" name="MetodoPago" id="MetodoPago" class="form-control" required>
            </div>

            <div class="form-group posicion2">
                <label for="Descuento">Descuento:</label>
                <select name="idDescuento" id="Descuento" class="form-control">
                    <option value="">Seleccione</option>
                    @foreach ($Descuentos as $Descuento)
                        <option value="{{ $Descuentos->idDescuento }}">
                            {{ $Descuento->Nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

           


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>

</x-director.layout>