<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();
        $totalUsuarios  = User::count();

        $productosPorCategoria = Producto::select('categoria')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('categoria')
            ->get();

        $precioPromedioPorCategoria = Producto::select('categoria')
            ->selectRaw('ROUND(AVG(precio), 2) as promedio')
            ->groupBy('categoria')
            ->get();

        $ultimosProductos = Producto::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProductos',
            'totalUsuarios',
            'productosPorCategoria',
            'precioPromedioPorCategoria',
            'ultimosProductos'
        ));
    }
}