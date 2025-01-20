<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/General.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Docentecss/Menu.css') }}">


    <title>COLEGIO FROEBEL/Docente</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
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
