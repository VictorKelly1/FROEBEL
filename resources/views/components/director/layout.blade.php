<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mi Aplicación' }}</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js"></script>


</head>


<body>
    <header><x-director.Header /></header>

    <x-director.Body />
    <x-director.sidebar />
    

    <main>
        {{ $slot }}
    </main>

    <footer>
    <x-director.footer />
    </footer>
</body>

</html>
