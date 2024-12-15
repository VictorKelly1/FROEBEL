<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">

        <form class="" action="{{ route('RegistrarPagos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Datos -->
            <h3>Datos</h3>

            <div class="form-group posicion1">
                <label for="Alumno">Alumno:</label>
                <select name="idAlumno" id="Alumno" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="{{ $Alumnos->idAlumno }}">{{ $Alumnos->Matricula }} - {{ $Alumnos->Nombre }}
                        {{ $Alumnos->ApellidoPaterno }} {{ $Alumnos->ApellidoMaterno }}</option>



                </select>
            </div>

            <div class="form-group">
                <label for="Metodo">Metodo de pago:</label>
                <input type="text" name="MetodoPago" id="Metodo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="CuentaRecibido">Cuenta que recibe:</label>
                <input type="text" name="CuentaRecibido" id="CuentaRecibido" class="form-control" required>
            </div>

            <div class="form-group posicion2">
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


            <div class="form-group posicion2">
                <label for="Periodo">Periodo:</label>
                <select name="idPeriodo" id="Periodo" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Periodos as $Periodo)
                        <option value="{{ $Periodo->idPeriodo }}">
                            {{ $Periodo->Clave }}
                             {{ $Periodo->FechaInicio }}
                             {{ $Periodo->FechaFin }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="number" name="Monto" id="Monto" class="form-control" required>
            </div>


            <div class="form-group posicion2">
                <label for="Descuento">Descuento:</label>
                <select name="idDescuento" id="Descuento" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Descuentos as $Descuento)
                        <option value="{{ $Descuento->idDescuento }}">
                            {{ $Descuento->Nombre }}
                        </option>
                    @endforeach

                </select>
            </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Pago</button>
        </form>
    </div>

</x-director.layout>
