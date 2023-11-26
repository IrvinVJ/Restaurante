<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cliente;
use App\Models\Ingreso;
use App\Models\mesa;
use App\Models\orden;
use App\Models\plato;
use App\Models\reservacione;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::count();
        $ingresos = Ingreso::count();
        $ventas = Venta::count();
        $mesas = mesa::where('IdEstadoMesas',1)->count();
        $pedidos = orden::where('IdEstadoOrdens',1)->count();
        $reservaciones = reservacione::count();
        $clientes = cliente::count();
        $platos = plato::count();
        return view('admin.index', compact('users', 'ingresos', 'ventas', 'mesas', 'pedidos', 'reservaciones', 'clientes', 'platos'));
    }
}
