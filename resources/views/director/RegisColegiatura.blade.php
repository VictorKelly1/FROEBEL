<x-director.layout>

    <div class=" flex items-center led2 posicionsregisalum">
      
    <form class="" action="{{ route('RegistrarColegiatura') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <!-- Datos -->
            <h3>Datos</h3>

         <div class="form-group posicion1">
            <label for="Alumno">Alumno:</label>
             <select name="idAlumno" id="Alumno" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Alumnos as $Alumno)
                    <option value="{{ $Alumno->Matricula }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }}
                        {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
                <label for="Metodo">Metodo:</label>
                <input type="text" name="Metodo" id="Metodo" class="form-control" required>
        </div>


         <div class="form-group posicion2">
            <label for="Periodo">Periodo:</label>
            <select name="idPeriodo" id="Periodo" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($Periodos as $Periodo)
                    <option value="{{ $Periodo->idPeriodo }}">{{ $Periodo->Periodo }}</option>
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
                    <option value="{{ $Descuento->idDescuento }}">{{ $Descuento->Descuento }}</option>
                @endforeach

            </select>
        </div>


            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Colegiatura</button>
        </form>
    </div>

</x-director.layout>