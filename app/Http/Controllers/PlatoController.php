<?php

namespace App\Http\Controllers;

use App\Models\categoria_plato;
use App\Models\plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatoController extends Controller
{
    function __construct(){
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-plato|crear-plato|editar-plato|borrar-plato', ['only'=>['index']]);
        $this->middleware('permission:crear-plato',['only' =>  'create','store']);
        $this->middleware('permission:editar-plato', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-plato', ['only'=>['destroy']]);
    }

    public function index()
    {
        $cat_plato = categoria_plato::all();
        $platos = DB::select('select p.IdPlato, p.NombrePlato, p.PrecioPlato, p.IdCategoriaPlatos,
        cp.IdCategoriaPlatos, cp.NombreCategoriaPlato from platos p
        inner join categoria_platos cp
        on p.IdCategoriaPlatos=cp.IdCategoriaPlatos');

        return view('platos.index', compact('platos', 'cat_plato'));
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
            'NombrePlato' => 'required',
            'PrecioPlato' => 'required',
            'IdCategoriaPlatos' => 'required'
        ]);

        $plato = new plato();
        $plato->NombrePlato=$request->NombrePlato;
        $plato->PrecioPlato=$request->PrecioPlato;
        $plato->IdCategoriaPlatos=$request->IdCategoriaPlatos;
        $plato->save();

        return redirect('platos');
    }

    /**
     * Display the specified resource.
     */
    public function show(plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdPlato)
    {
        $plato = plato::all();
        $plato = plato::find($IdPlato);
        $cat_plato = categoria_plato::all();

        return view('platos.edit', compact('plato', 'cat_plato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, plato $plato)
    {
        request()->validate([
            'NombrePlato' => 'required',
            'PrecioPlato' => 'required',
            'IdCategoriaPlatos' => 'required'
        ]);

        $plato->NombrePlato=$request->NombrePlato;
        $plato->PrecioPlato=$request->PrecioPlato;
        $plato->IdCategoriaPlatos=$request->IdCategoriaPlatos;
        $plato->save();

        return redirect('platos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plato $plato)
    {
        $plato->delete();
        return redirect('platos');
    }
}
