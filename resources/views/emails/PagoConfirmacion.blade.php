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
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #4CAF50;
            margin: 0;
        }

        .details {
            margin: 20px 0;
        }

        .details p {
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
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
