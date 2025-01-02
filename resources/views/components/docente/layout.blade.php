<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mi Aplicación' }}</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/General.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/header.css') }}">
    



    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js"></script>
   


</head>


<body>
    <header><x-docente.Header /></header>

    <x-docente.Body />
    <x-docente.sidebar />
    

    <main>
        {{ $slot }}
    </main>

    <footer>
    <x-docente.footer />
    </footer>
</body>

</html>
