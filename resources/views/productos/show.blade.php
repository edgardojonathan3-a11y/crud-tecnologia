<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Producto</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; width: 400px; }
        .btn { background: blue; color: white; padding: 10px; text-decoration: none; display: inline-block; margin-top: 10px; }
    </style>
</head>
<body>

<h1>Detalle del Producto</h1>

<div class="card">
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
    <p><strong>Fecha creación:</strong> {{ $producto->created_at }}</p>
</div>

<a href="{{ route('admin.productos.index') }}" class="btn">← Volver</a>

</body>
</html>