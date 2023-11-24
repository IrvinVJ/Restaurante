<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detalle_orden;
use App\Models\detalle_reservacione;
use App\Models\estado_orden;
use App\Models\mesa;
use App\Models\orden;
use App\Models\plato;
use App\Models\reservacione;
use App\Models\Venta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservaciones = DB::select('select r.IdReservacion, r.IdCliente, r.Fecha, r.Hora, r.NroPersonas,
        c.IdCliente, c.Dni, c.NombresCliente, c.ApellidosCliente, c.NroTelefono
        from reservaciones r
        inner join clientes c
        on r.IdCliente = c.IdCliente');
        $clientes = cliente::all();
        return view('reservaciones.index', compact('reservaciones', 'clientes'));
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
        request()->validate([
            'IdCliente' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required'
        ]);

        $reservacione = new reservacione();
        $reservacione->IdCliente = $request->get('IdCliente');
        $reservacione->Fecha = $request->get('Fecha');
        $reservacione->Hora = $request->get('Hora');
        $reservacione->NroPersonas = $request->get('NroPersonas');
        $reservacione->save();
        return redirect('reservaciones')->with('success', 'Reserva realizada satisfactoriamente');
    }

    public function reservacion($IdReservacion)
    {
        $reservacione = reservacione::all();
        $reservacione = reservacione::find($IdReservacion);
        //dd($reservacione);
        $ordens = orden::all();
        $est_o = estado_orden::all();
        $platos = plato::all();
        $mesas = mesa::all();
        $clientes = DB::select('select c.IdCliente, c.NombresCliente, c.ApellidosCliente from clientes c
        inner join reservaciones r
        on c.IdCliente = r.IdCliente
        where r.IdReservacion = ' . $IdReservacion);
        //dd($clientes);
        return view('reservaciones.Pedido', compact('reservacione', 'ordens', 'est_o', 'platos', 'mesas', 'clientes'));
    }
    public function storeorden(Request $request, reservacione $reservacione)
    {
        $reservacione->IdReservacion = $request->IdReservacion;
        //$detalle_reservacione = new detalle_reservacione();
        //$detalle_reservacione->IdReservacion = $request->IdReservacion;
        //dd($detalle_reservacione);
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
            $mesa = DB::update('update mesas set IdEstadoMesas = 3 where IdMesa =' . $request->IdMesa . ' ');
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
                $detalle -> CostoTotal = plato::find($prod[1])->PrecioPlato * $prod[0];
                $detalle->save();
                //#############################################################
                //Detalle_Reservacion
                $array_detreservacion = array();
                $array_detreservacion = detalle_orden::all();
                $maximo = count($array_detreservacion);
                //for ($i = 0; $i < $maximo; $i++) {
                    //$pro = explode(" ", $array[$i]); //Para borrar el espacio
                    //Insertando en la tabla detalle_reservacione
                    $detalle_reservacione = new detalle_reservacione();
                    $detalle_reservacione->IdReservacion = $request->IdReservacion;
                    //$detalle_reservacione->IdDetalleOrdens = $detalle->IdDetalleOrdens; No funciona
                    //$detalle_reservacione->IdDetalleOrdens = "".$maximo."";
                    $detalle_reservacione->IdDetalleOrdens = $maximo;
                    $detalle_reservacione->IdCliente = $request->IdCliente;
                    //dd($detalle_reservacione);
                    $detalle_reservacione->save();
                //}
                //#############################################################
            }

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        /*try{
            DB::beginTransaction();
            $array_detreservacion = array();
            $detalle_o = detalle_orden::all();
            //dd($detalle_o);
            $array_detreservacion = $detalle_o;
            $maximo = count($array_detreservacion);
            //dd($maximo);
            for ($i = 0; $i < $maximo; $i++) {
                $pro = explode(" ", $array[$i]); //Para borrar el espacio
                //Insertando en la tabla detalle_reservacione
                $detalle_reservacione->IdReservacion = $request->IdReservacion;
                //$detalle_reservacione->Cantidad = $pro[0];
                $detalle_reservacione->IdDetalleOrdens = $pro[0];
                //detalle_reservacione->IdDetalleOrdens = $detalle->IdDetalleOrdens;
                $detalle_reservacione->IdCliente = $request->IdCliente;
                //$detalle_reservacione->save();
            }
        }catch(Exception $ex){
            DB::rollback();
        }*/

        //$detalle_reservacione->IdDetalleOrdens = $detalle->IdDetalleOrdens;
        //$detalle_reservacione->IdCliente = $request->IdCliente;
        //dd($detalle_reservacione);
        $detalle_reservacione->save();
        return redirect('reservaciones')->with('success', 'Pedido realizado satisfactoriamente');
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
    public function show($IdReservacion)
    {
        $detalle_r = DB::select('select o.IdOrdens, o.IdMesa, o.IdEstadoOrdens,
        eo.IdEstadoOrdens, eo.DescripcionEstadoOrdens,
        m.IdMesa, m.IdEstadoMesas,
        em.IdEstadoMesas, em.DescripcionEstadoMesas,
        p.IdPlato, p.NombrePlato, p.PrecioPlato, p.IdCategoriaPlatos,
        cp.IdCategoriaPlatos, cp.NombreCategoriaPlato,
        deo.IdDetalleOrdens, deo.Cantidad, deo.IdOrdens, deo.IdPlato, deo.IdMesa,
        c.IdCliente, c.Dni, c.NombresCliente, c.ApellidosCliente, c.NroTelefono,
        r.IdReservacion, r.IdCliente, r.Fecha, r.Hora, r.NroPersonas,
        der.IdDetalleReservacion, der.IdReservacion, der.IdDetalleOrdens, der.IdCliente
        from detalle_reservaciones der
        inner join detalle_ordens deo
        on der.IdDetalleOrdens = deo.IdDetalleOrdens
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
        inner join reservaciones r
        on der.IdReservacion = r.IdReservacion
        inner join clientes c
        on r.IdCliente = c.IdCliente
        where der.IdReservacion=' . $IdReservacion . ' ');
        //where deo.IdOrdens=' .$request->IdOrdens.' ');

        $clientes = DB::select('select c.IdCliente, c.NombresCliente, c.ApellidosCliente from clientes c
        inner join reservaciones r
        on c.IdCliente = r.IdCliente
        where r.IdReservacion = ' . $IdReservacion);
        $reservacione = reservacione::all();
        $reservacione = reservacione::find($IdReservacion);

        /*$d_orden = detalle_orden::all();
        dd($d_orden);
        $total = detalle_reservacione::where('IdReservacion', $IdReservacion)->and('IdDetalleOrdens', $d_orden->IdOrdens)->sum('CostoTotal');
        dd($total);*/

        return view('reservaciones.detalles', compact('detalle_r', 'clientes', 'reservacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdReservacion)
    {
        $reservacione = reservacione::all();
        $reservacione = reservacione::find($IdReservacion);
        $clientes = Cliente::all();
        return view('reservaciones.edit', compact('reservacione', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservacione $reservacione)
    {
        request()->validate([
            'IdCliente' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required'
        ]);
        $reservacione->IdCliente = $request->IdCliente;
        $reservacione->Fecha = $request->Fecha;
        $reservacione->Hora = $request->Hora;
        $reservacione->NroPersonas = $request->NroPersonas;
        $reservacione->save();
        return redirect('reservaciones')->with('success', 'Reservación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservacione $reservacione)
    {
        $reservacione->delete();
        return back()->with('warning', 'Reserva eliminada correctamente');
    }
}
