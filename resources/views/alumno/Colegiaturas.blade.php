<x-alumno.layout>
    <style>
        /* Contenedor principal */
        .posiciontablasasig {
            display: flex;
            flex-wrap: nowrap; /* Evita que los elementos bajen */
            gap: 1.5rem; /* Espacio entre tarjetas */
            overflow-x: auto; /* Permite desplazamiento horizontal */
            padding: 1rem;
            background: #121212;
        }

        /* Estilo para las tarjetas (formularios) */
        .formulario {
            flex: 0 0 25%; /* Ancho relativo del recuadro */
            max-width: 25%;
            min-height: 500px; /* Incrementa el alto */
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .formulario:hover {
            transform: translateY(-5px); /* Efecto al pasar el cursor */
        }

        /* Efecto LED animado */
        .formulario::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 15px;
            padding: 2px;
            background: linear-gradient(90deg, #007bff, #00d4ff, #007bff);
            background-size: 300% 300%;
            animation: glow 3s linear infinite;
            z-index: -1;
        }

        @keyframes glow {
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

        .card {
            background: #1e1e1e;
            border-radius: 15px;
            color: #fff;
            text-align: center;
            padding: 2rem; /* Espaciado interno más grande */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            font-size: 1.8rem; /* Aumenta el tamaño del título */
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #00d4ff;
        }

        .card-text {
            font-size: 1.4rem; /* Texto más grande */
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 0.8rem 2rem; /* Botón más grande */
            font-size: 1.2rem;
            margin-top: 1.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #00d4ff;
        }

        /* Scrollbar personalizado */
        .posiciontablasasig::-webkit-scrollbar {
            height: 10px; /* Tamaño del scrollbar horizontal */
        }

        .posiciontablasasig::-webkit-scrollbar-thumb {
            background: #007bff;
            border-radius: 5px;
        }

        .posiciontablasasig::-webkit-scrollbar-thumb:hover {
            background: #00d4ff;
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
                        <p class="card-text">Costo: ${{ $Costo }}</p>
                        <input type="hidden" name="Clave" value="{{ $periodo->Clave }}">
                        <input type="hidden" name="Costo" value="{{ $Costo }}">
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
</x-alumno.layout>
