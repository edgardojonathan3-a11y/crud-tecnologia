<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        form { width: 400px; border: 1px solid #ddd; padding: 20px; }
        input, select { width: 100%; padding: 5px; margin: 5px 0 15px 0; }
        button { background: orange; color: white; padding: 10px; border: none; cursor: pointer; }
        .cancelar { background: gray; color: white; padding: 10px; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>

<h1>Editar Usuario</h1>

<form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $usuario->name }}" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="{{ $usuario->email }}" required>
    
    <label>Rol:</label>
    <select name="rol">
        <option value="usuario" {{ $usuario->rol == 'usuario' ? 'selected' : '' }}>Usuario normal</option>
        <option value="admin" {{ $usuario->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
    </select>
    
    <button type="submit">Actualizar Usuario</button>
    <a href="{{ route('admin.usuarios.index') }}" class="cancelar">Cancelar</a>
</form>

</body>
</html>