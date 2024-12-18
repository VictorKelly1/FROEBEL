<!DOCTYPE html>
<html>
@if ($InfoMail && $InfoMail->count())
    @foreach ($InfoMail as $info)

        <head>
            <title>Comunicado de: </title>
        </head>

        <body>
            <h1>Mensaje</h1>


        </body>
    @endforeach
@else
    <p>No hay información disponible.</p>
@endif

</html>
