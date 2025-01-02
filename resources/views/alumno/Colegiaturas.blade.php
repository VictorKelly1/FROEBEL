<x-alumno.layout>
    <style>
        .posiciontablasasig {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .formulario {
            flex: 0 0 20%; /* Cada contenedor ocupa el 20% de la pantalla */
            max-width: 20%;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .formulario:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            transition: background 0.5s ease;
        }

        .formulario:hover .card {
            background: linear-gradient(135deg, #d3cce3, #e9e4f0);
        }

        .card-body {
            text-align: center;
            padding: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: #6a11cb;
            border: none;
            border-radius: 20px;
            padding: 0.4rem 1.2rem;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2575fc;
        }

        /* Diseño responsivo */
        @media (max-width: 768px) {
            .formulario {
                flex: 0 0 45%; /* En pantallas medianas, 2 tarjetas por fila */
                max-width: 45%;
            }
        }

        @media (max-width: 480px) {
            .formulario {
                flex: 0 0 90%; /* En pantallas pequeñas, 1 tarjeta por fila */
                max-width: 90%;
            }
        }
    </style>

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
