<x-alumno.layout>



<div class="container posiciontablasasig">
    <div class="row">
        @foreach($periodos as $periodo)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $periodo->Tipo }}</h5>
                        <p class="card-text">Fecha: {{ $periodo->FechaInicio }} - {{ $periodo->FechaFin }}</p>
                        <p class="card-text">{{ $periodo->Clave }}</p>
                        <p class="card-text">{{ $Costo }}</p>
                        <a href="#" class="btn btn-primary">Pagar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



</x-alumno.layout>
