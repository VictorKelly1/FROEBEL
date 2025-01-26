<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar1.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pruebasidebar.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>COLEGIO FROEBEL/Director</title>
    <link rel="icon" href="{{ asset('images/logo-remove.png') }}" type="image/png">

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
