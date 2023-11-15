<?php

namespace App\Http\Controllers;

use App\Models\plato;
use App\Models\presupuesto;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class PresupuestoController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-presupuesto|crear-presupuesto|editar-presupuesto|borrar-presupuesto', ['only' => ['index']]);
        $this->middleware('permission:crear-presupuesto', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-presupuesto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-presupuesto', ['only' => ['destroy']]);
    }
    public function index()
    {
        $productos = Producto::all();
        $platos = plato::all();

        return view('presupuesto.index', compact('productos', 'platos'));
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
            // Aqui comienza la instrucción para ingresar a platos
            $array = array();
            $array = $request->producto;
            //dd($request);
            $max = count($array); //Obteniendo el tamaño del arreglo
            $total = 0;
            $prod = new Producto();
            for ($i = 0; $i < $max; $i++) {
                $prod = explode(" ", $array[$i]); //Para borrar el espacio
                //Insertando en la tabla detalle_ordens
                $detalle = new presupuesto();
                $detalle->Cantidad = $prod[0];
                $detalle->IdPlato = $prod[1];
                $detalle->IdProducto = $prod[2];
                $detalle->costoTotal = Producto::find($prod[2])->PrecioProducto * $prod[0];
                $detalle->save();
                $total += $detalle->costoTotal;
            }
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        return redirect('presupuesto');
    }


    public function show($IdPlato)
    {
        $detalle_p = DB::select('select pr.IdPresupuesto, pr.IdPlato, pr.IdProducto, pr.Cantidad, pr.CostoTotal,
        p.IdPlato, p.NombrePlato, p.PrecioPlato, p.IdCategoriaPlatos,
        cp.IdCategoriaPlatos, cp.NombreCategoriaPlato,
        prod.IdProducto, prod.NombreProducto, prod.Stock, prod.PrecioProducto, prod.IdUnidadMedida,
        um.IdUnidadMedida, um.DescripcionUM
        from presupuestos pr
        inner join platos p
        on pr.IdPlato = p.IdPlato
        inner join categoria_platos cp
        on p.IdCategoriaPlatos=cp.IdCategoriaPlatos
        inner join productos prod
        on pr.IdProducto=prod.IdProducto
        inner join unidad_medidas um
        on prod.IdUnidadMedida=um.IdUnidadMedida
        where pr.IdPlato=' .$IdPlato.' ');
        $total = presupuesto::where('IdPlato', $IdPlato)->sum('CostoTotal');
        //dd($total);
        return view('presupuesto.detalles', compact('detalle_p', 'total'));
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
