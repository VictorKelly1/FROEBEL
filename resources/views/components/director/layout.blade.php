<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mi Aplicación' }}</title>
</head>

<body>
    <header>
        <h1>Encabezado de la Aplicación</h1>
    </header>


    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>Pie de página de la Aplicación</p>
    </footer>
</body>

</html>
