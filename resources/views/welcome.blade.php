<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Colegio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/Welcome.css') }}">
</head>

<body>

    <!-- Header -->
    <header>
        Bienvenido al Portal del Colegio Froebel
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="login-container d-flex align-items-center">
            <!-- Lado izquierdo: Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/logoWelcome.png') }}" alt="Logo Colegio Froebel" class="logo">
            </div>

            <!-- Lado derecho: Texto y botón -->
            <div class="content-container text-center">
                <!-- Título -->
                <h1 class="title text-white">COLEGIO FROEBEL</h1>
                <p class="text text-white">
                    Accede con tu correo Institucional
                </p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="/google_auth/redirect" class="login-button">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Links Left -->
    <div class="footer-links">
        <p>Este es el sitio web oficial del Colegio FROEBEL</p>

    </div>

    <!-- Footer Links Right -->
    <div class="footer-links-right">
        <p>Se requiere un correo institucional para Acceder</p>

    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 Colegio Froebel. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
