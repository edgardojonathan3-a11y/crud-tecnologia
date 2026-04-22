<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Página de inicio (redirige según rol)
Route::get('/', function () {
    if(auth()->check()) {
        if(auth()->user()->rol == 'admin') {
            return redirect('/admin/productos');
        }
        return redirect('/usuario/productos');
    }
    return view('welcome');
});

// Rutas para USUARIOS NORMALES (solo lectura)
Route::middleware(['auth', 'rol:usuario'])->prefix('usuario')->name('usuario.')->group(function () {
    Route::get('/productos', [ProductoController::class, 'usuarioIndex'])->name('productos');
    Route::get('/productos/{producto}', [ProductoController::class, 'usuarioShow'])->name('productos.show');
});

// Rutas para ADMINISTRADORES (CRUD completo)
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Productos
    Route::resource('productos', ProductoController::class);
    
    // Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});

Route::get('/registro', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('registro');
Route::post('/registro', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
// Rutas de autenticación (las provee Breeze)
require __DIR__.'/auth.php';