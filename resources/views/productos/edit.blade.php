<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        form { width: 400px; border: 1px solid #ccc; padding: 20px; }
        input { width: 100%; padding: 5px; margin: 5px 0 15px 0; }
        button { background: orange; color: white; padding: 10px; border: none; cursor: pointer; }
        .cancelar { background: gray; }
    </style>
</head>
<body>

<h1>Editar Producto</h1>

<form action="{{ route('admin.productos.update', $producto) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Nombre del producto:</label>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
    
    <label>Categoría:</label>
    <input type="text" name="categoria" value="{{ $producto->categoria }}" required>
    
    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>
    
    <button type="submit">Actualizar</button>
    <a href="{{ route('admin.productos.index') }}" class="cancelar" style="background:gray; color:white; padding:10px; text-decoration:none;">Cancelar</a>
</form>

</body>
</html>