<!DOCTYPE html>
<html>
@if ($InfoMail && $InfoMail->count())
    @foreach ($InfoMail as $info)

        <head>
            <title>Confirmación de pago de {{ $info->NombreConcepto }}</title>
        </head>

        <body>
            <h1>Detalles de la Transacción</h1>

            <p>NO. Recibo: {{ $info->idTransaccion }}</p>
            <p>Monto Pagado: {{ $info->Monto }} en {{ $info->MetodoPago }}</p>
            <p>Del Alumno: {{ $info->Nombre }} {{ $info->ApellidoPaterno }} {{ $info->ApellidoMaterno }}</p>
            <p>Del Periodo: {{ $info->FechaInicio }} a {{ $info->FechaFin }}</p>


        </body>
    @endforeach
@else
    <p>No hay información disponible.</p>
@endif

</html>
