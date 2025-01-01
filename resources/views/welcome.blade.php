<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Colegio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-container {
            border-radius: 15px;
            border: 2px solid transparent;
            background: linear-gradient(135deg, #1e293b, #64748b);
            position: relative;
            overflow: hidden;
            width: 400px;
            padding: 2rem;
        }
        .login-button {
            background-color: #2d3748;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #4a5568;
        }
        .title-container {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        .title {
            font-size: 4.5rem;
            font-weight: bold;
            color: #ffffff;
            text-transform: uppercase;
        }
        .title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            margin: 0.5rem auto 0;
            background:rgb(17, 0, 255);
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
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="container mx-auto">

   
        <!-- Título -->
        <div class="title-container">
            <h1 class="title">COLEGIO FROEBEL</h1>
        </div>
        
        <div class="grid grid-cols-3 gap-4 items-start">
            <!-- Izquierda -->
            <div class="p-3 rounded-lg shadow-md bg-gray-800 text-white mt-5">
                <h2 class="text-xl font-bold">Información</h2>
                <p class="text-sm mt-2">Aquí puedes colocar información relevante sobre el inicio de sesión.</p>
                <a href="#" class="text-blue-400 hover:underline mt-2 inline-block">Más información</a>
               

            </div>
            
            <!-- Centro -->
            <div class="flex items-center justify-center w-full mt-5">
                <div class="login-container text-center">
                    <h1 class="text-2xl font-bold text-white mb-5">Accede con tu correo Institucional</h1>
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                    <button class="login-button">
                    <a href="/google_auth/redirect">Iniciar Sesión</a>
                    </button>
                    
                </div>
            </div>
            


            <!-- Derecha -->
            <div class="p-3 rounded-lg shadow-md bg-gray-800 text-white mt-5 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold">Soporte</h2>
                    <p class="text-sm mt-2">¿Necesitas ayuda? Contacta con el equipo de soporte.</p>
                    <a href="#" class="text-blue-400 hover:underline mt-2 inline-block">Contactar</a>
                </div>
               
            </div>
            
        </div>
    </div>
</body>
</html>






    <style>
.posicionimgwelcome{
width: 30%  ;
height:30% ;

}
     
</style>