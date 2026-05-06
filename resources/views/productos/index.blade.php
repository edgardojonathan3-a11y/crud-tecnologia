<!DOCTYPE html>
<html>
<head>
    <title>Productos Tecnológicos</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; margin: 2px; display: inline-block; }
        .btn-verde { background: green; color: white; }
        .btn-azul { background: blue; color: white; }
        .btn-naranja { background: orange; color: white; }
        .btn-rojo { background: red; color: white; }
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

<a href="{{ route('admin.usuarios.index') }}" style="background:purple; color:white; padding:10px; text-decoration:none; float:right; margin-right:10px;">
   Usuarios
</a>

<h1>Panel Admin - Productos Tecnológicos</h1>
<p>Bienvenido, <strong>{{ auth()->user()->name }}</strong></p>

<br>

<a href="{{ route('admin.productos.create') }}" class="btn btn-verde">➕ Nuevo Producto</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>${{ $producto->precio }}</td>
            <td>
                <a href="{{ route('admin.productos.show', $producto) }}" class="btn btn-azul">Ver</a>
                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-naranja">Editar</a>
                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-rojo" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>