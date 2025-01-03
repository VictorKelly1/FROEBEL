<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Colegio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animación del subrayado */
        .title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            margin: 0.5rem auto 0;
            background: rgb(17, 0, 255);
            animation: underlineAnimation 2s infinite alternate;
        }
        @keyframes underlineAnimation {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(80px);
            }
        }

        /* Estilo general del cuerpo */
        body {
            font-family: 'Colegios Frebel', sans-serif;
            background-color:rgb(8, 7, 28); /* Fondo azul oscuro */
            margin: 0;
            padding: 0;
        }

        /* Logo del Colegio */
        .logo {
            max-width: 80px;
            margin-bottom: 1rem;
        }

        /* Botón de inicio de sesión */
        .login-button {
            background: linear-gradient(to right,rgb(0, 225, 255),rgb(23, 11, 249));
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Estilo de los contenedores */
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            min-height: 100vh;
            padding: 0 1rem;
        }

        /* Flexbox para los contenedores laterales y el contenedor central */
        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
        }

        .login-container {
            background: #222;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            margin-top: 50px;
            text-align: center;
        }

        .login-container h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        /* Animación de entrada para el formulario */
        .login-container {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Estilo del logo */
        .login-logo {
            margin-bottom: 1.5rem;
        }

        /* Estilo de los contenedores laterales */
        .side-container {
            background-color:rgb(11, 14, 40);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            color: white;
            flex: 1;
            margin: 0 10px;
        }

        .side-container h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .side-container a {
            color:rgb(143, 142, 165);
            text-decoration: none;
            display: block;
            margin-top: 0.5rem;
        }

        .side-container a:hover {
            text-decoration: underline;
        }

        /* Header */
        header {
            background-color: rgb(22, 29, 43);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 1.2rem;
            position: sticky; 
            
        }

        /* Footer */
        footer {
            background-color:rgb(22, 29, 43);
            padding: 10px;
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Flexbox para los contenedores laterales en una fila */
        .side-containers {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 40px;
        }

        /* Asegurar que todos los contenedores laterales tengan la misma altura */
        .side-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Estilo para la alineación correcta de los contenedores laterales */
        .side-container {
            flex: 1;
        }

        /* Ajuste del contenedor central para que no ocupe demasiado espacio */
        .login-container {
            margin-top: 0; /* Remover margen superior innecesario */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        Bienvenido al Portal del Colegio Froebel
    </header>

    <div class="container">
        <div class="main-content">
            <div class="login-container text-center">

                <!-- Título -->
                <h1 class="text-4xl font-bold text-white uppercase">COLEGIO FROEBEL</h1>
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

    <!-- Footer -->
    <footer>
        © 2025 Colegio Froebel. Todos los derechos reservados.
    </footer>

</body>
</html>
