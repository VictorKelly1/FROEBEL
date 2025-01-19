<x-alumno.layout>
    <style>
        /* Contenedor principal */
        .posiciontablasasig {
            display: flex;
            flex-wrap: nowrap;
            gap: 1.5rem; /* Aumentamos el espacio entre los contenedores */
            overflow-x: auto;
            padding: 1rem;
            background: #121212;
            scrollbar-width: thin;
            scrollbar-color: #007bff #1e1e1e;
        }

        /* Tarjeta de formulario */
        .formulario {
            flex: 0 0 30%;
            max-width: 30%;
            min-height: 450px; /* Aumentamos la altura */
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .formulario:hover {
            transform: translateY(-5px);
        }

        /* Borde LED animado */
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

        .formulario:hover::before {
            animation: glowHover 2s ease-in-out infinite; /* Animación cuando el mouse pasa */
        }

        @keyframes glowHover {
            0% {
                background-position: 0% 50%;
                background: linear-gradient(90deg, #00d4ff, #00ff99, #00d4ff); /* Celeste a verde claro */
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
            padding: 1.5rem;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #00d4ff;
        }

        .card-text {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #444;
        }

        .card-text:last-child {
            border-bottom: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 0.6rem 1.5rem;
            font-size: 1rem;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #00d4ff;
        }

        /* Estilo del scrollbar */
        .posiciontablasasig::-webkit-scrollbar {
            height: 8px;
        }

        .posiciontablasasig::-webkit-scrollbar-track {
            background: #1e1e1e;
        }

        .posiciontablasasig::-webkit-scrollbar-thumb {
            background: #007bff;
            border-radius: 10px;
        }

        .posiciontablasasig::-webkit-scrollbar-thumb:hover {
            background: #00d4ff;
        }
    </style>

    <div class="container posiciontablas">
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
