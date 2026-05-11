<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
<div class="mx-auto max-w-xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-8 rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Panel de administrador</p>
        <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Crear nuevo producto</h1>
    </div>

    <!-- Formulario -->
    <div class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-8 shadow-sm">
        <form action="{{ route('admin.productos.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf

    <!-- Nombre -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Nombre producto</label>
                <input
                    type="text"
                    name="nombre"
                    required
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-200"
                >
            </div>

    <!-- Categoria -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Categorías</label>
                <input
                    type="text"
                    name="categoria"
                    required
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-200"
                >
            </div>

    <!-- Precio -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Precios</label>
                <input
                    type="number"
                    step="0.01"
                    name="precio"
                    required
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:bg-white focus:ring-2 focus:ring-slate-200"
                >
            </div>

    <!-- Acciones -->
            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button
                    type="submit"
                    class="inline-flex flex-1 items-center justify-center rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
                    Guardar producto
                </button>
                
                <a href="{{ route('admin.productos.index') }}"
                    class="inline-flex flex-1 items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Cancelar
                </a>
            </div>

        </form>
    </div>

</div>
</body>
</html>