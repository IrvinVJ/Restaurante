<?php

namespace App\Http\Controllers;

use App\Models\detalle_orden;
use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use App\Models\orden;
use App\Models\Producto;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $gastos = DetalleIngreso::all();
        $ingresos = Ingreso::all();
        $ventas = orden::all();
        //dd($ingresos);
        //$total = DetalleIngreso::where('IdIngreso', $ingresos->IdIngreso)->sum('CostoTotal');
        $total = DetalleIngreso::selectRaw('IdIngreso, sum(CostoTotal) as total')->groupBy('IdIngreso')->get();
        $total_ventas = detalle_orden::selectRaw('IdOrdens, sum(CostoTotal) as total')->groupBy('IdOrdens')->get();
        //dd($total);
        return view('graficos.gproductos', compact('productos', 'gastos', 'total', 'ingresos', 'total_ventas', 'ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
