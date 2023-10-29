<?php

namespace App\Http\Controllers;

use App\Models\estado_mesa;
use App\Models\mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$mesas = mesa::all();
        $mesas = DB::select('select m.IdMesa, m.IdEstadoMesas,
        em.IdEstadoMesas, em.DescripcionEstadoMesas
        from mesas m
        inner join estado_mesas em
        on m.IdEstadoMesas = em.IdEstadoMesas');
        $est_mesa = estado_mesa::all();
        return view('mesas.index', compact('mesas', 'est_mesa'));
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
            'IdEstadoMesas' => 'required',
        ]);
        mesa::create($request->all());
        return redirect('mesas')->with('success', 'Nueva mesa creada!');
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
    public function edit($IdMesa)
    {
        $mesa = mesa::all();
        $mesa = mesa::findOrFail($IdMesa);
        $est_mesa = estado_mesa::all();
        return view('mesas.edit', compact('mesa', 'est_mesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mesa $mesa)
    {
        request()->validate([
            'IdEstadoMesas' => 'required',
        ]);
        $mesa->update($request->all());
        return redirect('mesas')->with('success', 'Mesa actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mesa $mesa)
    {
        $mesa->delete();
        return redirect('mesas')->with('warning', 'Mesa eliminada!');
    }
}
