<x-alumno.layout>


    <div class="container posiciontablasasig">
        @foreach ($periodos as $periodo)
            <form class="formulario" action="{{ route('PagarColegiatura') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $periodo->Tipo }}</h5>
                        <p class="card-text">Fecha: {{ $periodo->FechaInicio }} - {{ $periodo->FechaFin }}</p>
                        <p class="card-text">Clave: {{ $periodo->Clave }}</p>
                        <p class="card-text">Costo: {{ $Costo }}</p>
                        <input type="hidden" name="Clave" value="{{ $periodo->Clave }}">
                        <input type="hidden" name="Costo" value="{{ $Costo }}">
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
</x-alumno.layout>
