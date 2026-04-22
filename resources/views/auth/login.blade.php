<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CRUD Tecnología</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>🔐 Iniciar Sesión</h1>
        
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <input type="email" name="email" placeholder="Correo electrónico" required autofocus>
            
            <input type="password" name="password" placeholder="Contraseña" required>
            
            <button type="submit">Ingresar</button>
        </form>
        
        <div class="register-link">
            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
        </div>
    </div>
</body>
</html>