<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Alumnocss/General.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Alumnocss/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Alumnocss/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Alumnocss/Colegiatura.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Alumnocss/Menu.css') }}">
  
    <title>COLEGIO FROEBEL/Alumno</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js"></script>
   


</head>


<body>
    <header><x-alumno.Header /></header>

    <x-alumno.Body />
    <x-alumno.sidebar />
    

    <main>
        {{ $slot }}
    </main>

    <footer>
    <x-alumno.footer />
    </footer>
</body>

</html>
