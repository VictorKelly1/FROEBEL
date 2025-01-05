<x-director.layout>
    @if (!empty($Alumnos))
        <h3>
            {{ $Alumnos->Nombre }} {{ $Alumnos->ApellidoPaterno }} {{ $Alumnos->ApellidoMaterno }}
            {{ $Alumnos->Matricula }}

        </h3>
        <div class=" flex items-center posicionregisdesc">

            <form class="formulario2x2" action="{{ route('RegistrarColegiatura') }}" method="POST"
                enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="Alumno">Alumno:</label>
                    <input type="hidden" name="idAlumno" id="Alumno" value="{{ $Alumnos->idAlumno }}">
                    <input type="text" class="form-control"
                        value="{{ $Alumnos->Nombre }} {{ $Alumnos->ApellidoPaterno }} {{ $Alumnos->ApellidoMaterno }}"
                        disabled>
                </div>


                <div class="form-group">
                    <label for="Metodo">Metodo de pago:</label>
                    <input type="text" name="MetodoPago" id="Metodo" class="form-control" required>
                </div>


                <div class="form-group ">
                    <label for="Periodo">Periodo:</label>
                    <select name="idPeriodo" id="Periodo" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($Periodos as $Periodo)
                            <option value="{{ $Periodo->idPeriodo }}">
                                {{ $Periodo->Clave }}
                                Inicio: {{ $Periodo->FechaInicio }}
                                Fin: {{ $Periodo->FechaFin }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="Monto">Monto:</label>
                    <input type="number" min="0" name="Monto" id="Monto" class="form-control" required>
                </div>


                <div class="form-group ">
                    <label for="Descuento">Descuento:</label>
                    <select name="idDescuento" id="Descuento" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($Descuentos as $Descuento)
                            <option value="{{ $Descuento->idDescuento }}">
                                {{ $Descuento->Nombre }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary">Registrar Colegiatura</button>
            </form>
        </div>
    @else
        <div class="sindatos">
            ⚠️ No se encontraron datos para mostrar.
        </div>
    @endif

</x-director.layout>
