<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #fff; /* Letra blanca */
            margin: 0;
            padding: 0;
            background-color: #121212; /* Fondo negro */
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #121212; /* Fondo negro en el contenedor */
            border: 3px solid #00FFFF; /* Borde LED celeste */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.8); /* Efecto LED alrededor */
            animation: glow 1.5s ease-in-out infinite; /* Animación del borde LED */
        }

        /* Animación del borde con efecto LED */
        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(0, 255, 255, 0.8), 0 0 20px rgba(0, 255, 255, 0.6), 0 0 30px rgba(0, 255, 255, 0.4);
            }
            50% {
                box-shadow: 0 0 20px rgba(0, 255, 255, 1), 0 0 40px rgba(0, 255, 255, 0.8), 0 0 60px rgba(0, 255, 255, 0.6);
            }
            100% {
                box-shadow: 0 0 10px rgba(0, 255, 255, 0.8), 0 0 20px rgba(0, 255, 255, 0.6), 0 0 30px rgba(0, 255, 255, 0.4);
            }
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #00FFFF; /* Borde inferior celeste */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #fff; /* Letra blanca */
            margin: 0;
        }

        .details {
            margin: 20px 0;
        }

        .details p {
            margin: 5px 0;
            color: #fff; /* Letra blanca */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa; /* Texto en gris claro */
        }
    </style>
</head>

<body>
    @if ($InfoMail && $InfoMail->count())
        @foreach ($InfoMail as $info)
            <div class="email-container">
                <div class="header">
                    <h1>Confirmación de Pago</h1>
                </div>
                <div class="details">
                    <p><strong>No. de Recibo:</strong> {{ $info->idTransaccion }}</p>
                    <p><strong>Concepto:</strong> {{ $info->NombreConcepto }}</p>
                    <p><strong>Monto Pagado:</strong> ${{ $info->Monto }} MXN</p>
                    <p><strong>Método de Pago:</strong> {{ $info->MetodoPago }}</p>
                    <p><strong>Alumno:</strong> {{ $info->Nombre }} {{ $info->ApellidoPaterno }}
                        {{ $info->ApellidoMaterno }}</p>
                    <p><strong>Periodo:</strong> {{ $info->FechaInicio }} - {{ $info->FechaFin }}</p>
                </div>
                <p>Agradecemos tu confianza y preferencia.</p>
                <div class="footer">
                    <p>Este correo es una confirmación automática, no es necesario responder.</p>
                    <p>&copy; {{ date('Y') }} Colegio FROEBEL. Todos los derechos reservados.</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="email-container">
            <div class="header">
                <h1>No hay Información Disponible</h1>
            </div>
            <p>Actualmente no se encuentra disponible información sobre las transacciones.</p>
        </div>
    @endif
</body>

</html>
