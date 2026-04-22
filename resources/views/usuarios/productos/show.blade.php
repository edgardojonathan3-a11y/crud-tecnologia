<!DOCTYPE html>
<html>
<head>
    <title>Detalle Producto</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; width: 400px; }
        .btn { background: blue; color: white; padding: 10px; text-decoration: none; display: inline-block; }
        .logout { background: red; color: white; padding: 10px; text-decoration: none; float: right; }
    </style>
</head>
<body>

<a href="{{ route('logout') }}" class="logout" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   Cerrar Sesión
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<h1>Detalle del Producto</h1>

<div class="card">
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
</div>

<a href="{{ route('usuario.productos') }}" class="btn">← Volver</a>

</body>
</html>