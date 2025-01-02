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

        /* Botón de inicio de sesión */
        .login-button {
            background: linear-gradient(to right, #4f46e5, #6b21a8);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="container mx-auto px-4">

        <!-- Título -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white uppercase">COLEGIO FROEBEL</h1>
            <div class="title"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            
            <!-- Izquierda: Información -->
            <div class="p-5 rounded-lg shadow-md bg-gray-800 text-white">
                <h2 class="text-xl font-bold">Información</h2>
                <p class="text-sm mt-2">Accede con tu cuenta institucional para gestionar tus actividades escolares.</p>
                <a href="#" class="text-blue-400 hover:underline mt-2 inline-block">Más información</a>
            </div>
            
            <!-- Centro: Formulario de inicio de sesión -->
            <div class="flex items-center justify-center">
                <div class="login-container text-center shadow-lg p-6 rounded-lg bg-gray-800 w-full max-w-md">
                    <h1 class="text-2xl font-bold text-white mb-5">Accede con tu correo Institucional</h1>
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
            
            <!-- Derecha: Soporte -->
            <div class="p-5 rounded-lg shadow-md bg-gray-800 text-white flex flex-col justify-between">
                <h2 class="text-xl font-bold">Soporte</h2>
                <p class="text-sm mt-2">¿Necesitas ayuda? Contacta con el equipo de soporte.</p>
                <a href="#" class="text-blue-400 hover:underline mt-2 inline-block">Contactar</a>
            </div>
        </div>
    </div>
</body>
</html>
