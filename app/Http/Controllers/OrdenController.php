<?php

namespace App\Http\Controllers;

use App\Models\detalle_orden;
use App\Models\estado_orden;
use App\Models\mesa;
use App\Models\orden;
use App\Models\plato;
use App\Models\presupuesto;
use App\Models\Producto;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-pedido|crear-pedido|editar-pedido|borrar-pedido', ['only' => ['index']]);
        $this->middleware('permission:crear-pedido', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-pedido', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-pedido', ['only' => ['destroy']]);
    }

    public function index()
    {
        $detalle_ordens = DB::select('select o.IdOrdens, o.IdMesa, o.IdEstadoOrdens, o.created_at,
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
        on p.IdCategoriaPlatos = cp.IdCategoriaPlatos');
        $ordens = orden::all();
        $est_o = estado_orden::all();
        $platos = plato::all();
        $mesas = mesa::all();

        return view('ordens.index', compact('detalle_ordens', 'ordens', 'est_o', 'platos', 'mesas'));
    }


    public function pdf(){

        $orden_fecha = orden::selectRaw('date(created_at) as fechas, count(IdOrdens) as cantidad')->groupBy('fechas')->get();

        $pdf = Pdf::loadView('ordens.pdf', compact('orden_fecha'));
        return view('ordens.pdf', compact('orden_fecha'));
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
        try {
            // dd($request->all());
            DB::beginTransaction();
            //Insertando en la tabla ordens
            $orden = new orden();
            $orden->IdMesa = $request->IdMesa;
            $orden->IdEstadoOrdens = $request->IdEstadoOrdens;
            $orden->save();
            //Insertando en la tabla ventas
            $venta = new Venta();
            $venta->IdEstadoVentas = 1;
            $venta->IdOrdens = $orden->IdOrdens;
            $venta->IdTipoDocumento = 1;
            $serie = '';
            $correlativo = '';
            if ($venta->IdTipoDocumento == 1) {
                $serie = "B001";
            } elseif ($venta->IdTipoDocumento == 2) {
                $serie = "F001";
            } elseif ($venta->IdTipoDocumento == 3) {
                $serie = "P001";
            }
            $venta->Serie = $serie;
            $numero = DB::table('ventas as v')->where('v.Serie',$serie)->count();
            $venta->Correlativo = $this->IndiceNumeroDocumentoVenta($numero+1);
            //dd($venta);
            $venta->save();
            //Actualizando estado de la mesa en la tabla mesas
            $mesa = DB::update('update mesas set IdEstadoMesas = 2 where IdMesa =' . $request->IdMesa . ' ');
            // Aqui comienza la instrucción para ingresar a platos
            $array = array();
            $array = $request->plato;
            //dd($request);
            $max = count($array); //Obteniendo el tamaño del arreglo

            for ($i = 0; $i < $max; $i++) {
                $prod = explode(" ", $array[$i]); //Para borrar el espacio
                //Insertando en la tabla detalle_ordens
                $detalle = new detalle_orden();
                $detalle->Cantidad = $prod[0];
                $detalle->IdOrdens = $orden->IdOrdens;
                $detalle->IdPlato = $prod[1];
                $detalle->IdMesa = $prod[2];
                $detalle->CostoTotal = plato::find($prod[1])->PrecioPlato * $prod[0];
                $detalle->save();
            }
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        return redirect('ordens');
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
     * Display the specified resource.
     */
    public function show($IdOrdens)
    {
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
        where deo.IdOrdens=' . $IdOrdens . ' ');

        $total = detalle_orden::where('IdOrdens', $IdOrdens)->sum('CostoTotal');

        return view('ordens.detalles', compact('detalle_o', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdOrdens)
    {
        $ordens = orden::all();
        $ordens = orden::find($IdOrdens);
        $est_ordens = estado_orden::all();
        $mesa = DB::select('select o.IdOrdens, o.IdMesa, m.IdMesa from ordens o
        inner join mesas m
        on o.IdMesa = m.IdMesa
        where o.IdOrdens =' . $IdOrdens);
        //dd($mesa);
        return view('ordens.edit', compact('ordens', 'est_ordens', 'mesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orden $orden)
    {
        try{
            DB::beginTransaction();
            //$orden -> IdMesa = $request->IdMesa;
            $orden->IdEstadoOrdens = $request->IdEstadoOrdens;
            $orden->save();
            $presupesto = presupuesto::all();
            // Quiero que después de guardar el IdEstadoOrdens, verificar si es igual a 2, de ser así, actualizar el stock de productos
            //Verificamos que el estado del pedido sea igual a atendido
            if ($orden->IdEstadoOrdens == 2) {
            // Actualiza el stock de los productos
                $detalle = detalle_orden::where('IdOrdens', $orden->IdOrdens
                )->get();
                foreach ($detalle as $d) {
                    foreach ($presupesto as $p) {
                        if ($d->IdPlato == $p->IdPlato) {
                            $prodActual = Producto::findOrFail($p->IdProducto);
                            $nuevoStock = $prodActual->Stock - ($d->Cantidad * $p->Cantidad);
                            $prodActual->Stock = $nuevoStock;
                            $prodActual->save();
                        }
                    }

                }
            }
            //El estado de la mesa cambia a libre
            $mesa = DB::update('update mesas set IdEstadoMesas = 1 where IdMesa =' . $request->IdMesa . ' ');

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            }
            return redirect('ordens');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orden $orden)
    {
        try{
            DB::beginTransaction();
            $orden->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect('ordens');
    }
}
