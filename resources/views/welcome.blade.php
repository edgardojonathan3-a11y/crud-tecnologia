<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Tecnología</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: #f4f6fb;
            color: #1f2937;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 24px;
        }

        .top-nav {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-bottom: 28px;
            font-size: 0.95rem;
        }

        .top-nav a {
            color: #2563eb;
            text-decoration: none;
        }

        .top-nav a:hover {
            text-decoration: underline;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 28px;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            gap: 18px;
        }

        .grid-2 {
            grid-template-columns: 1fr;
        }

        .title {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }

        .subtitle {
            margin-top: 12px;
            color: #4b5563;
            line-height: 1.75;
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 28px;
            color: #6b7280;
            font-size: 0.9rem;
            flex-wrap: wrap;
            gap: 10px;
        }

        @media (min-width: 768px) {
            .grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Route::has('login'))
            <nav class="top-nav">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            </nav>
        @endif

        <section class="card">
            <h1 class="title">CRUD Tecnología</h1>
            <p class="subtitle">Bienvenido a la plantilla del proyecto. Aquí puedes gestionar productos, usuarios y acceder al panel según tu autenticación.</p>
        </section>

        <section class="grid grid-2">
            <article class="card">
                <h2 class="section-title">Productos</h2>
                <p class="subtitle">Administra el stock y actualiza los datos de cada producto de manera rápida y clara.</p>
            </article>
            <article class="card">
                <h2 class="section-title">Usuarios</h2>
                <p class="subtitle">Revisa los usuarios registrados, asigna roles y controla el acceso al sistema.</p>
            </article>
            <article class="card">
                <h2 class="section-title">Autenticación</h2>
                <p class="subtitle">La aplicación utiliza la autenticación de Laravel para proteger rutas y dar acceso al dashboard.</p>
            </article>
            <article class="card">
                <h2 class="section-title">Soporte</h2>
                <p class="subtitle">Puedes adaptar la vista con tus propios estilos, enlaces y contenido para que el sitio se vea más natural.</p>
            </article>
        </section>

        <footer class="footer">
            <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
            <span>PHP v{{ PHP_VERSION }}</span>
        </footer>
    </div>
</body>
</html>
