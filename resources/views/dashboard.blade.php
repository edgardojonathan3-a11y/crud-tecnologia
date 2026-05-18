<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard · Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
<div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8 space-y-6">

    {{-- ── Header ── --}}
    <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Panel de administrador</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">Dashboard</h1>
                <p class="mt-1 text-sm text-slate-500">
                    Bienvenido, <span class="font-semibold text-slate-700">{{ auth()->user()->name }}</span>
                </p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="{{ route('admin.productos.index') }}"
                   class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Productos
                </a>
                <a href="{{ route('admin.usuarios.index') }}"
                   class="inline-flex items-center justify-center rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                    Usuarios
                </a>
                <a href="{{ route('logout') }}"
                   class="inline-flex items-center justify-center rounded-full bg-rose-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-rose-700"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    {{-- ── Tarjetas resumen ── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm flex items-center gap-5">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-900 text-white text-2xl"></div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Total productos</p>
                <p class="mt-1 text-4xl font-semibold text-slate-900">{{ $totalProductos }}</p>
            </div>
        </div>
        <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm flex items-center gap-5">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-900 text-white text-2xl"></div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Total usuarios</p>
                <p class="mt-1 text-4xl font-semibold text-slate-900">{{ $totalUsuarios }}</p>
            </div>
        </div>
    </div>

    {{-- ── Gráficos fila 1 ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-1">Distribución</p>
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Productos por categoría</h3>
            <canvas id="chartBarCategorias" height="220"></canvas>
        </div>
        <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-1">Proporción</p>
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Categorías</h3>
            <canvas id="chartDoughnut" height="220"></canvas>
        </div>
    </div>

    {{-- ── Gráfico precio promedio (ancho completo) ── --}}
    <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-1">Precios</p>
        <h3 class="text-lg font-semibold text-slate-900 mb-4">Precio promedio por categoría</h3>
        <canvas id="chartBarPrecios" height="100"></canvas>
    </div>

    {{-- ── Últimos productos ── --}}
    <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-[0_24px_64px_rgba(15,23,42,0.08)] backdrop-blur-sm">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 mb-1">Recientes</p>
        <h3 class="text-lg font-semibold text-slate-900 mb-4">Últimos 5 productos agregados</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="pb-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Nombre</th>
                        <th class="pb-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Categoría</th>
                        <th class="pb-3 text-right text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Precio</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($ultimosProductos as $p)
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3 font-medium text-slate-800">{{ $p->nombre }}</td>
                        <td class="py-3 text-slate-500">{{ $p->categoria }}</td>
                        <td class="py-3 text-right font-semibold text-slate-900">${{ number_format($p->precio, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
    const categorias = @json($productosPorCategoria->pluck('categoria'));
    const totales    = @json($productosPorCategoria->pluck('total'));
    const promedios  = @json($precioPromedioPorCategoria->pluck('promedio'));

    const palette = ['#0f172a','#1e293b','#334155','#475569','#64748b','#94a3b8','#cbd5e1','#e2e8f0'];

    new Chart(document.getElementById('chartBarCategorias'), {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{ label: 'Cantidad', data: totales, backgroundColor: palette, borderRadius: 10, borderSkipped: false }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f1f5f9' } },
                x: { grid: { display: false } }
            }
        }
    });

    new Chart(document.getElementById('chartDoughnut'), {
        type: 'doughnut',
        data: {
            labels: categorias,
            datasets: [{ data: totales, backgroundColor: palette, borderWidth: 2, borderColor: '#fff' }]
        },
        options: {
            responsive: true,
            cutout: '65%',
            plugins: { legend: { position: 'bottom', labels: { padding: 16, font: { size: 12 } } } }
        }
    });

    new Chart(document.getElementById('chartBarPrecios'), {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{ label: 'Precio promedio ($)', data: promedios, backgroundColor: '#0f172a', borderRadius: 10, borderSkipped: false }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                y: { grid: { display: false } }
            }
        }
    });
</script>
</body>
</html>