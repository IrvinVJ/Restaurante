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
        $reservaciones = DB::select('select r.IdReservacion, r.IdCliente, r.Fecha, r.Hora,
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
        where r.IdReservacion = '.$IdReservacion);
        //dd($clientes);
        return view('reservaciones.Pedido', compact('reservacione', 'ordens', 'est_o', 'platos', 'mesas', 'clientes'));
    }
    public function storeorden(Request $request, reservacione $reservacione)
    {
        $reservacione->IdReservacion = $request->IdReservacion;
        $detalle_reservacione = new detalle_reservacione();
        $detalle_reservacione->IdReservacion = $request->IdReservacion;
        //dd($detalle_reservacione);
        try {
            // dd($request->all());
            DB::beginTransaction();
            //Insertando en la tabla ordens
            $orden = new orden();
            $orden->IdMesa = $request->IdMesa;
            $orden->IdEstadoOrdens = $request->IdEstadoOrdens;
            $orden->save();
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
                $detalle->save();
            }
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        $detalle_reservacione->IdDetalleOrdens = $detalle->IdDetalleOrdens;
        $detalle_reservacione->IdCliente = $request->IdCliente;
        //dd($detalle_reservacione);
        $detalle_reservacione->save();
        return redirect('reservaciones')->with('success', 'Pedido realizado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(reservacione $reservacione)
    {
        //
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
