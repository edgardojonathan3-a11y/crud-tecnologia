<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CRUD Tecnología</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 flex items-center justify-center px-4">

    <div class="w-full max-w-sm">

        {{-- Header --}}
        <div class="mb-6 rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">CRUD Tecnología</p>
            <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Iniciar sesión</h1>
        </div>

        {{-- Errores --}}
        @if ($errors->any())
            <div class="mb-4 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-medium text-rose-700">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Formulario --}}
        <div class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-8 shadow-sm">
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
                @csrf

                {{-- Email --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Correo electrónico</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="correo@ejemplo.com"
                        required
                        autofocus
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-200"
                    >
                </div>

                {{-- Contraseña --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Contraseña</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-200"
                    >
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="inline-flex w-full items-center justify-center rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
                    Ingresar
                </button>

            </form>
        </div>

        {{-- Link registro --}}
        <p class="mt-6 text-center text-sm text-slate-500">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="font-semibold text-slate-700 underline underline-offset-2 hover:text-slate-900">
                Regístrate aquí
            </a>
        </p>

    </div>

</body>
</html>