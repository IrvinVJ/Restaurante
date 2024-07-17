<?php

namespace App\Http\Controllers;

use App\Models\estado_mesa;
use App\Models\mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-mesa|crear-mesa|editar-mesa|borrar-mesa', ['only' => ['index']]);
        $this->middleware('permission:crear-mesa', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-mesa', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-mesa', ['only' => ['destroy']]);
    }

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
        try{
            DB::beginTransaction();
            mesa::create($request->all());
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            }
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
        try{
            DB::beginTransaction();
            request()->validate([
                'IdEstadoMesas' => 'required',
            ]);
            $mesa->update($request->all());
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            }
            return redirect('mesas')->with('success', 'Mesa actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mesa $mesa)
    {
        try{
            DB::beginTransaction();
            $mesa->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        return redirect('mesas')->with('success', 'Mesa eliminada!');
    }
}
