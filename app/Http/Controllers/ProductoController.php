<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario para crear producto
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar producto nuevo
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->save();
        
        return redirect()->route('admin.productos.index');
    }

    /**
     * Ver un producto específico
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar producto
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->save();
        
        return redirect()->route('admin.productos.index');
    }

    /**
     * Eliminar producto
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index');
    }
    public function usuarioIndex()
    {
        $productos = Producto::all();
        return view('usuarios.productos.index', compact('productos'));
    }

    public function usuarioShow(Producto $producto)
    {
        return view('usuarios.productos.show', compact('producto'));
    }
}