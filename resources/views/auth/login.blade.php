<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('fondos/puerta3.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(2px);
        }

        .content {
            position: relative;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .login-container img {
            width: 200px;
            height: auto;
            margin-bottom: 1px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .login-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px; /* Asegura que ambos inputs tengan el mismo tamaño de texto */
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        /* Estilos para los mensajes de error */
        .alert {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="content">
        <div class="login-container">
            <img src="fondos/logo.png" alt="Logo">
            <h2>Inicio de Sesión</h2>
            
            <!-- Mostrar mensajes de error -->
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
            @csrf

                <div>
                <label for="email">Correo electrónico:</label>
                <input id="email" type="email" name="email" required autofocus>
                </div>

                <div>
                <label for="password">Contraseña:</label>
                <input id="password" type="password" name="password" required>
                </div>

                <button type="submit">Iniciar Sesión</button>
            </form>
<!-- Botón para registrar un nuevo usuario -->
<div class="mt-3">
            <p>¿No tienes una cuenta?</p>
            <p>Contacta al admin para solicitar tu cuenta</p>
            <!-- <a href="{{ route('register') }}" class="btn btn-secondary">Contacta al admin para solicitar una</a> -->
        </div>

        </div>
    </div>
</body>
</html>
