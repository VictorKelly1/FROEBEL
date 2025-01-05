<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Colegio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animación de subrayado */
        .title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            margin: 0.5rem auto 0;
            background: rgb(0, 255, 255);
            animation: underlineAnimation 3s infinite alternate;
        }

        @keyframes underlineAnimation {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(80px);
            }
        }

        /* Animación de subrayado para header y footer */
        .line-animation::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background: rgb(0, 255, 255);
            animation: slideLine 5s ease-in-out infinite alternate;
        }

        @keyframes slideLine {
            0% {
                transform: scaleX(0);
            }

            100% {
                transform: scaleX(1);
            }
        }

        /* Estilo general del cuerpo */
        body {
            font-family: 'Colegios Frebel', sans-serif;
            background-color: rgb(8, 7, 28); /* Fondo azul oscuro */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }

        /* Botón de inicio de sesión */
        .login-button {
            background: linear-gradient(to right, rgb(0, 225, 255), rgb(23, 11, 249));
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 12px rgba(0, 255, 255, 0.4);
        }

        .login-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 255, 255, 0.6);
        }

        .login-button:active {
            transform: translateY(0);
            box-shadow: 0 6px 12px rgba(0, 255, 255, 0.5);
        }

        /* Contenedores principales */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 3%;
            width: 100%;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
        }

        .login-container {
            background: #222;
            padding: 5% 3%;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            max-width: 60%;
            width: 100%;
            margin-top: 5%;
            text-align: center;
            transform: translateY(0);
            animation: slideUp 0.8s ease-in-out;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #00FFFF;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .title {
            margin: 1.5rem 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(0, 255, 255, 1), rgba(23, 11, 249, 1));
            border-radius: 5px;
            width: 50px;
            animation: pulse 1.5s ease-in-out infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scaleX(1);
            }

            100% {
                transform: scaleX(1.2);
            }
        }

        /* Header */
        header {
            background-color: rgb(22, 29, 43);
            padding: 0.5% 3%; /* Header más delgado */
            text-align: center;
            color: white;
            font-size: 1.2rem;
            position: sticky;
            top: 0;
            z-index: 999;
            width: 100%;
        }

        header.line-animation::after {
            /* Línea animada para el header */
            animation: slideLine 5s ease-in-out infinite alternate;
        }

        /* Footer */
        footer {
            background-color: rgb(22, 29, 43);
            padding: 0.5% 3%; /* Footer más delgado */
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer.line-animation::after {
            /* Línea animada para el footer */
            animation: slideLine 5s ease-in-out infinite alternate;
        }

        /* Contenedores de información en las esquinas inferiores */
        .footer-links {
            position: absolute;
            bottom: 8%; /* Subimos los contenedores más cerca del footer */
            left: 3%;
            background-color: rgb(11, 14, 40);
            color: white;
            padding: 2% 3%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 255, 255, 0.4);
            width: 25%;
            text-align: center;
            font-size: 1rem;
            transform: translateY(100%);
            animation: slideInUp 0.8s ease-in-out forwards;
        }

        .footer-links:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 255, 255, 0.5);
        }

        .footer-links a {
            color: rgb(143, 142, 165);
            text-decoration: none;
            display: block;
            margin: 8px 0;
            font-size: 1rem;
        }

        .footer-links a:hover {
            color: rgb(0, 255, 255);
            text-decoration: underline;
        }

        .footer-links:nth-child(2) {
            right: 3%;
            left: unset;
        }

        /* Animación para aparecer desde abajo */
        @keyframes slideInUp {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Contenedor de enlaces adicional a la derecha */
        .footer-links-right {
            position: absolute;
            bottom: 8%; /* Subimos los contenedores más cerca del footer */
            right: 3%;
            background-color: rgb(11, 14, 40);
            color: white;
            padding: 2% 3%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 255, 255, 0.4);
            width: 25%;
            text-align: center;
            font-size: 1rem;
            transform: translateY(100%);
            animation: slideInUp 0.8s ease-in-out forwards;
        }

        .footer-links-right:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 255, 255, 0.5);
        }

        .footer-links-right a {
            color: rgb(143, 142, 165);
            text-decoration: none;
            display: block;
            margin: 8px 0;
            font-size: 1rem;
        }

        .footer-links-right a:hover {
            color: rgb(0, 255, 255);
            text-decoration: underline;
        }

        /* Ajustes responsivos */
        @media (max-width: 768px) {
            .login-container {
                max-width: 80%;
            }

            .footer-links {
                width: 40%;
            }

            .footer-links-right {
                width: 40%;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                max-width: 90%;
            }

            .footer-links {
                width: 50%;
            }

            .footer-links-right {
                width: 50%;
            }
        }

    </style>
</head>

<body>

    <!-- Header -->
    <header class="line-animation">
        Bienvenido al Portal del Colegio Froebel
    </header>

    <div class="">
        <div class="main-content">
            <div class="login-container text-center">

                <!-- Título -->
                <h1 class="text-4xl font-bold text-white">COLEGIO FROEBEL</h1>
                <div class="title"></div>

                <!-- Formulario de Inicio de sesión -->
                <h2 class="text-xl font-semibold text-white mt-6">Accede con tu correo Institucional</h2>

                @if (session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="/google_auth/redirect" class="login-button w-full block py-2 rounded-lg text-white text-lg">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Links Left -->
    <div class="footer-links">
        <a href="#">Enlace 1</a>
        <a href="#">Enlace 2</a>
        <a href="#">Enlace 3</a>
    </div>

    <!-- Footer Links Right -->
    <div class="footer-links-right">
        <a href="#">Enlace A</a>
        <a href="#">Enlace B</a>
        <a href="#">Enlace C</a>
    </div>

    <!-- Footer -->
    <footer class="line-animation">
        <p>© 2025 Colegio Froebel. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
