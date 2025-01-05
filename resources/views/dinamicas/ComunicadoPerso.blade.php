<x-director.layout>
@if(!empty($Alumno) && $Alumno = null)
    <div class=" flex items-center  posiciontablaalumno">

        <form class="formulario" action="{{ route('ComunicadoPersonal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Datos -->
            <h2>Enviar correo a: {{ $Alumno->first()->Nombre }}
                {{ $Alumno->first()->ApellidoPaterno }}
                {{ $Alumno->first()->ApellidoMaterno }}.
            </h2>
            <div class="form-group">
                <label for="Titulo">Titulo:</label>
                <input type="text" name="Titulo" id="Titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="hidden" name="Destinatario" value={{ $Alumno->first()->Matricula }}>
            </div>

            <div class="form-control form-control-lg">
                <label for="ComunicadoPersonal">Mensaje:</label>
                <textarea name="ComunicadoPersonal" id="ComunicadoPersonal" class="form-control" rows="7" required></textarea>
            </div>
            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Enviar Correo</button>
        </form>
    </div>
    @else
    <div class="sindatos">
        ⚠️ No se encontraron datos para mostrar.
    </div>
@endif
</x-director.layout>
