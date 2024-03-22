<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detalle_orden;
use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use App\Models\mesa;
use App\Models\orden;
use App\Models\plato;
use App\Models\Producto;
use App\Models\reservacione;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

class Apiproducto extends Controller
{
    public function apiproducto()
    {
        $productos = Producto::get();
        return response()->json($productos);
    }
    public function apiingresos()
    {
        //$ingresos = DetalleIngreso::selectRaw('IdIngreso, sum(CostoTotal) as total')->groupBy('IdIngreso')->get();
        $total = DetalleIngreso::sum('CostoTotal');
        return response()->json(floatval($total));
    }
    public function apiventas()
    {
        $total = detalle_orden::sum('CostoTotal');
        return response()->json(floatval($total));
    }
    public function apidashboard()
    {
        $users = User::count();
        $ingresos = Ingreso::count();
        $ventas = Venta::count();
        $mesas = mesa::where('IdEstadoMesas', 1)->count();
        $pedidos = orden::where('IdEstadoOrdens', 1)->count();
        $reservaciones = reservacione::count();
        $clientes = cliente::count();
        $platos = plato::count();
        $data = ['Usuarios' => $users, 'Ingresos' => $ingresos, 'Ventas' => $ventas, 'Clientes' => $clientes, 'Platos' => $platos, 'Mesas' => $mesas, 'Pedidos' => $pedidos, 'Reservaciones' => $reservaciones];
        return response()->json($data);
    }
    public function apidemandaplatos()
    {
        $total_platos = detalle_orden::selectRaw('IdPlato, sum(Cantidad) as cant_platos_pedidos')->groupBy('IdPlato')->get();
        $platos = plato::get();

        $data = [];
        foreach ($platos as $plato) {
            $data[] = [
                'NombrePlato' => $plato->NombrePlato,
                'cant_platos_pedidos' => $total_platos->where('IdPlato', $plato->IdPlato)->first()->cant_platos_pedidos ?? 0
            ];
        }

        return response()->json(['data' => $data]);
    }
    public function apiatencionesdiarias()
    {
        $orden_fecha = orden::selectRaw('date(created_at) as fechas, count(IdOrdens) as cantidad')->groupBy('fechas')->get();
        return response()->json($orden_fecha);
    }
}
