<x-alumno.layout>



    <div class="container posiciontablasasig">
        <div class="row">
            @foreach ($periodos as $periodo)
                <form class="formulario" action="{{ route('PagarColegiatura') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $periodo->Tipo }}</h5>
                                <p class="card-text">Fecha: {{ $periodo->FechaInicio }} - {{ $periodo->FechaFin }}</p>
                                <p class="card-text">{{ $periodo->Clave }}</p>
                                <p class="card-text">{{ $Costo }}</p>
                                <input type="hidden" name="Clave" value={{ $periodo->Clave }}>
                                <input type="hidden" name="Costo" value={{ $Costo }}>
                                <button type="submit" class="btn btn-primary">Pagar</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>



</x-alumno.layout>
