<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        form { width: 400px; border: 1px solid #ccc; padding: 20px; }
        input { width: 100%; padding: 5px; margin: 5px 0 15px 0; }
        button { background: green; color: white; padding: 10px; border: none; cursor: pointer; }
        .cancelar { background: gray; }
    </style>
</head>
<body>

<h1>Crear Nuevo Producto</h1>

<form action="{{ route('admin.productos.store') }}" method="POST">
    @csrf
    
    <label>Nombre del producto:</label>
    <input type="text" name="nombre" required>
    
    <label>Categoría:</label>
    <input type="text" name="categoria" required>
    
    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" required>
    
    <button type="submit">💾 Guardar</button>
    <a href="{{ route('productos.index') }}" class="cancelar" style="background:gray; color:white; padding:10px; text-decoration:none;">Cancelar</a>
</form>

</body>
</html>