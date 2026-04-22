<!DOCTYPE html>
<html>
<head>
    <title>Productos Tecnológicos</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; background: blue; color: white; }
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

<h1>📱 Productos Tecnológicos</h1>
<p>Bienvenido, <strong>{{ auth()->user()->name }}</strong> (Usuario)</p>

<br>

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
                <a href="{{ route('usuario.productos.show', $producto) }}" class="btn">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>