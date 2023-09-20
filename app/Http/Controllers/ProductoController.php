<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    function __construct(){
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only'=>['index']]); 
        $this->middleware('permission:crear-producto',['only' =>  'create','store']);
        $this->middleware('permission:editar-producto', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-producto', ['only'=>['destroy']]);
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'NombreProducto' => 'required',
            'Stock' => 'required'
        ]);
        //Producto::create($request->all());
        $producto = new Producto();
        $producto->NombreProducto=$request->txtproducto;
        $producto->Stock=$request->txtcantidad;
        $producto->save();
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate([
            'NombreProducto' => 'required',
            'Stock' => 'required'
        ]);

        $producto->update($request->all());
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect('productos');
    }
}
