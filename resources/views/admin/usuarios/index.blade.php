<!DOCTYPE html>
<html>
<head>
    <title>Administrar Usuarios</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; margin: 2px; display: inline-block; }
        .btn-naranja { background: orange; color: white; }
        .btn-rojo { background: red; color: white; }
        .btn-verde { background: green; color: white; }
        .logout { background: red; color: white; padding: 10px; text-decoration: none; float: right; }
        .admin-badge { background: gold; color: black; padding: 2px 5px; border-radius: 5px; }
        .usuario-badge { background: silver; padding: 2px 5px; border-radius: 5px; }
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

<h1>👑 Panel de Administrador</h1>
<p>Bienvenido, <strong>{{ auth()->user()->name }}</strong> (Administrador)</p>

<hr>

<h2>📦 Productos</h2>
<a href="{{ route('admin.productos.index') }}" class="btn btn-verde">Gestionar Productos</a>

<hr>

<h2>👥 Usuarios Registrados</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }} @if($usuario->id == auth()->id()) (Tú) @endif</td>
            <td>{{ $usuario->email }}</td>
            <td>
                @if($usuario->rol == 'admin')
                    <span class="admin-badge">Administrador</span>
                @else
                    <span class="usuario-badge">Usuario</span>
                @endif
            </td>
            <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-naranja">Editar</a>
                @if($usuario->id != auth()->id())
                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-rojo" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
<a href="{{ route('admin.productos.index') }}" class="btn btn-verde">← Ir a Productos</a>

</body>
</html>