<x-director.layout>
<h1 class="posiciontitulo">Datos</h1>
    <div class=" flex items-center posiciontablasmedia">
    
        <form class="formulario " action="{{ route('RegistrarPago') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Datos -->
            

            <div class="form-group ">
                <label for="Alumno">Alumno:</label>
                <select name="idAlumno" id="Alumno" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($Alumnos as $Alumno)
                        <option value="{{ $Alumno->idAlumno }}">{{ $Alumno->Matricula }} - {{ $Alumno->Nombre }}
                            {{ $Alumno->ApellidoPaterno }} {{ $Alumno->ApellidoMaterno }}</option>
                    @endforeach


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


            <div class="form-group ">
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
            <button type="submit" class="btn btn-primary">Registrar Pago</button>
        </form>
    </div>



<style>


@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

.posiciontitulo {
    font-family: 'Playfair Display', serif; /* Fuente formal */
    font-size: 4vw; /* Tamaño de fuente responsivo */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centrar texto */
    color: white; /* Texto blanco */
    text-transform: uppercase; /* Texto en mayúsculas */
    letter-spacing: 1px; /* Espaciado entre letras */
    margin: 0 auto; /* Centrar horizontalmente */
    background: linear-gradient(90deg, #6f42c1, #ff6f61, #42a5f5, #6f42c1);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: waveAnimation 5s infinite linear;
    display: inline-block; /* Tamaño ajustado al texto */
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */

    top: 35%;    /* alto */
    left: 20%; /* lado */
}

@keyframes waveAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}




</style>








</x-director.layout>
