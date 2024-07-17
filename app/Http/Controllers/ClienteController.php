<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente', ['only' => ['index']]);
        $this->middleware('permission:crear-cliente', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-cliente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only' => ['destroy']]);
    }

    public function index()
    {
        $clientes = cliente::all();
        return view('clientes.index', compact('clientes'));
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
        try{
            DB::beginTransaction();
            request()->validate([
                'Dni' => 'required',
                'NombresCliente' => 'required',
                'ApellidosCliente' => 'required',
                'NroTelefono' => 'required'
            ]);
            $cliente = new cliente();
            $cliente->Dni = $request->get('Dni');
            $cliente->NombresCliente = $request->get('NombresCliente');
            $cliente->ApellidosCliente = $request->get('ApellidosCliente');
            $cliente->NroTelefono = $request->get('NroTelefono');
            $cliente->save();
            return redirect('clientes')->with('success', 'Cliente guardado!');
            DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return redirect('clientes')->with('error', 'Error al guardar el cliente!');
            }

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
    public function edit($IdCliente)
    {
        $cliente = cliente::all();
        $cliente = cliente::find($IdCliente);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $cliente)
    {
        try{
            DB::beginTransaction();
            request()->validate([
                'Dni' => 'required',
                'NombresCliente' => 'required',
                'ApellidosCliente' => 'required',
                'NroTelefono' => 'required'
            ]);

            $cliente -> Dni = $request->get('Dni');
            $cliente -> NombresCliente = $request->get('NombresCliente');
            $cliente -> ApellidosCliente = $request->get('ApellidosCliente');
            $cliente -> NroTelefono = $request->get('NroTelefono');
            $cliente -> save();
            return redirect('clientes')->with('success', 'Registro actualizado correctamente');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('clientes')->with('error', 'Error al actualizar el cliente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        try{
            DB::beginTransaction();
            $cliente->delete();
            return redirect('clientes')->with('warning', 'Se elimino el registro con exito');
            DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return redirect('clientes')->with('error', 'Error al eliminar el registro!');
            }
    }
}
