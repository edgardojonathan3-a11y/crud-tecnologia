<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
<div class="mx-auto max-w-xl px-4 py-8 sm:px-6 lg:px-8">

        <!-- Header -->
    <div class="mb-8 rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Panel de administrador</p>
        <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Detalle del producto</h1>
    </div>

        <!-- Carta de detalle -->
    <div class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm">
        <dl class="divide-y divide-slate-100">

            <div class="flex items-center justify-between px-6 py-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">ID</dt>
                <dd class="text-sm font-medium text-slate-700">{{ $producto->id }}</dd>
            </div>

            <div class="flex items-center justify-between px-6 py-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Nombre</dt>
                <dd class="text-sm font-medium text-slate-700">{{ $producto->nombre }}</dd>
            </div>

            <div class="flex items-center justify-between px-6 py-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Categoría</dt>
                <dd class="text-sm font-medium text-slate-700">{{ $producto->categoria }}</dd>
            </div>

            <div class="flex items-center justify-between px-6 py-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Precio</dt>
                <dd class="text-sm font-medium text-slate-700">${{ number_format($producto->precio, 2, ',', '.') }}</dd>
            </div>

            <div class="flex items-center justify-between px-6 py-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Fecha de creación</dt>
                <dd class="text-sm font-medium text-slate-700">{{ $producto->created_at->format('d/m/Y H:i') }}</dd>
            </div>

        </dl>
    </div>

    {{-- Volver --}}
    <div class="mt-6">
        <a href="{{ route('admin.productos.index') }}"
           class="inline-flex items-center rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
            ← Volver a productos
        </a>
    </div>

</div>
</body>
</html>