<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
            border-bottom: 2px solid #2196F3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #2196F3;
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
                    <h1>Confirmación de Compra</h1>
                </div>
                <div class="details">
                    <h2>Detalles de la Transacción</h2>
                    <p><strong>No. de Recibo:</strong> {{ $info->idTransaccion }}</p>
                    <p><strong>Concepto de Compra:</strong> {{ $info->NombreConcepto }}</p>
                    <p><strong>Monto Pagado:</strong> ${{ $info->Monto }} MXN</p>
                    <p><strong>Método de Pago:</strong> {{ $info->MetodoPago }}</p>
                    <p><strong>Nombre del Comprador:</strong> {{ $info->Nombre }} {{ $info->ApellidoPaterno }}
                        {{ $info->ApellidoMaterno }}</p>
                    <p><strong>Periodo Aplicable:</strong> {{ $info->FechaInicio }} - {{ $info->FechaFin }}</p>
                </div>
                <p>Gracias por realizar tu compra con nosotros. Si tienes alguna pregunta, no dudes en contactarnos.</p>
                <div class="footer">
                    <p>Este correo es una confirmación automática, por favor no respondas.</p>
                    <p>&copy; {{ date('Y') }} Colegio FROEBEL. Todos los derechos reservados.</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="email-container">
            <div class="header">
                <h1>No hay Información Disponible</h1>
            </div>
            <p>Actualmente no se encuentra disponible información sobre compras realizadas.</p>
        </div>
    @endif
</body>

</html>
