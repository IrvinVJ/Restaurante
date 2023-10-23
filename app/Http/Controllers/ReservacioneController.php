<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\reservacione;
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
        $reservacione -> IdCliente = $request -> IdCliente;
        $reservacione -> Fecha = $request -> Fecha;
        $reservacione -> Hora = $request -> Hora;
        $reservacione -> save();
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
