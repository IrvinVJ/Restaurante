<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detalle_orden;
use App\Models\estado_venta;
use App\Models\orden;
use App\Models\presupuesto;
use App\Models\Producto;
use App\Models\tipo_documento;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-venta|crear-venta|editar-venta|borrar-venta', ['only' => ['index']]);
        $this->middleware('permission:crear-venta', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-venta', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-venta', ['only' => ['destroy']]);
    }

    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }


    public function pdf(){
        $detalle_o = DB::select('select o.IdOrdens, o.IdMesa, o.IdEstadoOrdens, o.created_at,
        eo.IdEstadoOrdens, eo.DescripcionEstadoOrdens,
        m.IdMesa, m.IdEstadoMesas,
        em.IdEstadoMesas, em.DescripcionEstadoMesas,
        p.IdPlato, p.NombrePlato, p.PrecioPlato, p.IdCategoriaPlatos,
        cp.IdCategoriaPlatos, cp.NombreCategoriaPlato,
        deo.IdDetalleOrdens, deo.Cantidad, deo.IdOrdens, deo.IdPlato, deo.IdMesa, deo.CostoTotal
        from detalle_ordens deo
        inner join ordens o
        on deo.IdOrdens = o.IdOrdens
        inner join estado_ordens eo
        on o.IdEstadoOrdens=eo.IdEstadoOrdens
        inner join mesas m
        on o.IdMesa = m.IdMesa
        inner join estado_mesas em
        on m.IdEstadoMesas = em.IdEstadoMesas
        inner join platos p
        on deo.IdPlato = p.IdPlato
        inner join categoria_platos cp
        on p.IdCategoriaPlatos = cp.IdCategoriaPlatos
        order by o.created_at');
        $total = detalle_orden::sum('CostoTotal');
        $ventas = orden::all();
        $total_ventas = detalle_orden::selectRaw('IdOrdens, sum(CostoTotal) as total')->groupBy('IdOrdens')->get();

        $pdf = Pdf::loadView('ventas.pdf', compact('detalle_o', 'total', 'total_ventas', 'ventas'));
        return view('ventas.pdf', compact('detalle_o', 'total', 'total_ventas', 'ventas'));
        //return $pdf->stream();
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

    }

    /**
     * Display the specified resource.
     */
    public function show($IdVenta)
    {
        $venta = DB::table('ventas as v')
        ->join('ordens as o', 'v.IdOrdens', '=', 'o.IdOrdens')
        ->select('o.created_at', 'v.IdTipoDocumento', 'v.Serie','v.Correlativo')
        ->where('v.IdVenta','=',$IdVenta)->first();

        $detalle_v = DB::select('select o.IdOrdens, o.IdEstadoOrdens,
        p.IdPlato, p.NombrePlato, p.PrecioPlato,
        deo.IdDetalleOrdens, deo.Cantidad, deo.IdOrdens, deo.IdPlato, deo.CostoTotal,
        v.IdVenta, v.IdEstadoVentas, v.IdTipoDocumento, v.IdOrdens
        from ventas v
        inner join ordens o
        on v.IdOrdens = o.IdOrdens
        inner join detalle_ordens deo
        on deo.IdOrdens = o.IdOrdens
        inner join platos p
        on deo.IdPlato = p.IdPlato
        where v.IdVenta= '.$IdVenta.' ');

        $cliente = DB::table('ventas as v')
        ->join('ordens as o', 'v.IdOrdens', '=', 'o.IdOrdens')
        ->join('detalle_ordens as deo', 'deo.IdOrdens', '=', 'o.IdOrdens')
        ->join('detalle_reservaciones as der', 'deo.IdDetalleOrdens', '=', 'der.IdDetalleOrdens')
        ->join('clientes as c', 'c.IdCliente', '=', 'der.IdCliente')
        ->select('c.Dni', DB::raw('concat(c.NombresCliente, " ", c.ApellidosCliente) as NombreCompleto'), 'c.NroTelefono')
        ->where('v.IdVenta','=',$IdVenta)->first();
        if($cliente == null){
            $cliente = new cliente();
            $cliente->Dni = '00000000';
            $cliente->NombreCompleto= 'Sin Nombre';
            $cliente->NroTelefono = '999-999-999';
        }

        $serie = '';
        $correlativo = '';
        if($venta->IdTipoDocumento == 1){
            $serie = "B001";
        }elseif ($venta->IdTipoDocumento == 2) {
            $serie = "F001";
        }elseif ($venta->IdTipoDocumento == 3) {
            $serie = "P001";
        }
        //dd($detalle_v, $cliente);
        return view('ticket.ticketventa', compact('detalle_v', 'cliente', 'venta'));
    }

    function IndiceNumeroDocumentoVenta($Num)

    {

        $newNum = '';

        if (($Num / 10000000) > 1) {

            return '' . $Num;
        } elseif (($Num / 1000000) > 1) {

            $newNum = '0' . $Num;

            return $newNum;
        } elseif (($Num / 100000) > 1) {

            $newNum = '00' . $Num;

            return $newNum;
        } elseif (($Num / 10000) > 1) {

            $newNum = '000' . $Num;

            return $newNum;
        } elseif (($Num / 1000) > 1) {

            $newNum = '0000' . $Num;

            return $newNum;
        } elseif (($Num / 100) > 1) {

            $newNum = '00000' . $Num;

            return $newNum;
        } elseif (($Num / 10) > 1) {

            $newNum = '000000' . $Num;

            return $newNum;
        } else {

            $newNum = '0000000' . $Num;

            return $newNum;
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdVenta)
    {
        $ventas = Venta::all();
        $ventas = Venta::find($IdVenta);
        $est_venta = estado_venta::all();
        $tipo_documento = tipo_documento::all();
        return view('ventas.edit', compact('ventas', 'est_venta', 'tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        try{
            DB::beginTransaction();
        $venta -> IdEstadoVentas = $request -> IdEstadoVentas;

        $venta -> IdTipoDocumento = $request -> IdTipoDocumento;
        $serie = '';
        $correlativo = '';
        if($venta->IdTipoDocumento == 1){
            $serie = "B001";
        }elseif ($venta->IdTipoDocumento == 2) {
            $serie = "F001";
        }elseif ($venta->IdTipoDocumento == 3) {
            $serie = "P001";
        }
        $venta->Serie = $serie;
        $venta -> save();

        DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect('ventas')->with('success', 'Estado de Venta actualizado correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function actualizarStockDespuesDeVenta(Venta $venta)
    {
        try{
            DB::beginTransaction();
            $detalleOrdens = detalle_orden::all();
            $presupuesto = presupuesto::all();
            //$producto = Producto::all();
            if ($venta->IdEstadoVentas === 2) {
                // Actualiza el stock de los productos
                foreach ($detalleOrdens as $do) {
                    if ($do->IdOrdens == $venta->IdOrdens && $do->IdPlato == $presupuesto->IdPlato) {
                        $prodActual = Producto::findOrFail($presupuesto->IdProductos);
                        $nuevoStock = $prodActual->Stock - ($do->Cantidad * $presupuesto->Cantidad);
                        $prodActual->Cantidad = $nuevoStock;
                        $prodActual->save();
                    }
                }
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
    }
}
