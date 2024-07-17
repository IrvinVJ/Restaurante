<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Barryvdh\DomPDF\Facade\Pdf;
use Countable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-ingreso|crear-ingreso|editar-ingreso|borrar-ingreso', ['only' => ['index']]);
        $this->middleware('permission:crear-ingreso', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-ingreso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-ingreso', ['only' => ['destroy']]);
    }

    public function index()
    {
        $detalle_ingresos = DB::select('select p.IdProducto, p.NombreProducto, p.Stock, p.IdUnidadMedida, u.IdUnidadMedida, u.DescripcionUM,
        i.IdIngreso, i.created_at,
        di.IdDetalleIngreso, di.IdIngreso, di.IdProducto, di.Cantidad, di.CostoUnitario, di.CostoTotal
        from detalle_ingresos di
        inner join productos p
        on di.IdProducto = p.IdProducto
        inner join unidad_medidas u
        on p.IdUnidadMedida=u.IdUnidadMedida
        inner join ingresos i
        on di.idIngreso=i.IdIngreso');
        $ingresos = Ingreso::all();
        $product = Producto::all();
        return view('ingresos.index', compact('detalle_ingresos', 'ingresos', 'product'));
    }


    public function pdf(){
        $detalle_i = DB::select('select p.IdProducto, p.NombreProducto, p.Stock, p.IdUnidadMedida, u.IdUnidadMedida, u.DescripcionUM,
        i.IdIngreso, i.created_at,
        di.IdDetalleIngreso, di.IdIngreso, di.IdProducto, di.Cantidad, di.CostoUnitario, di.CostoTotal
        from detalle_ingresos di
        inner join productos p
        on di.IdProducto = p.IdProducto
        inner join unidad_medidas u
        on p.IdUnidadMedida=u.IdUnidadMedida
        inner join ingresos i
        on di.idIngreso=i.IdIngreso
        order by i.created_at');
        $ingresos = Ingreso::all();
        $total = DetalleIngreso::sum('CostoTotal');

        $total_ing = DetalleIngreso::selectRaw('IdIngreso, sum(CostoTotal) as total')->groupBy('IdIngreso')->get();


        $pdf = Pdf::loadView('ingresos.pdf', compact('ingresos', 'detalle_i', 'total', 'total_ing'));
        return view('ingresos.pdf', compact('ingresos', 'detalle_i', 'total', 'total_ing'));
        return $pdf->stream();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            DB::beginTransaction();
            $ingreso = Ingreso::all();
            $product = Producto::all();
            $um = UnidadMedida::all();
            return view('ingresos.create', compact('ingreso', 'producto', 'um'));
            }catch(\Exception $e){
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            DB::beginTransaction();
            //Insertando en la tabla ingreso
            $ingreso = new Ingreso();
            $ingreso->save();

            // Aqui comienza la instrucción para ingresar a productos
            $array = array();
            $array = $request->producto;
            //dd($request);
            //print_r($array);
            $max = count($array); //Obteniendo el tamaño del arreglo
            //dd($max);

            for ($i = 0; $i < $max; $i++) {
                $prod = explode(" ", $array[$i]); //Para borrar el espacio
                //Insertando en la tabla detalle_ingresos
                $detalle = new DetalleIngreso();
                $detalle->IdIngreso = $ingreso->IdIngreso;
                $detalle->IdProducto = $prod[0];
                $detalle->Cantidad = $prod[1];
                //Actualizando stock en la tabla Productos
                $product = Producto::find((int)$prod[0]);
                $product->Stock = $product->Stock + $prod[1];
                $product->save();
                //Continuamos guardando los demás datos en la tabla Detalle_Ingresos
                $detalle->CostoUnitario = $prod[2];
                // El cálculo de costo total
                $detalle -> CostoTotal = Producto::find($prod[0])->PrecioProducto * $prod[1];
                $detalle->save();
            }
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        return redirect('ingresos');
    }

    /**
     * Display the specified resource.
     */
    public function show($IdIngreso)
    {
        $detalle_i = DB::select('select p.IdProducto, p.NombreProducto, p.Stock, p.IdUnidadMedida, u.IdUnidadMedida, u.DescripcionUM,
        i.IdIngreso, i.created_at,
        di.IdDetalleIngreso, di.IdIngreso, di.IdProducto, di.Cantidad, di.CostoUnitario, di.CostoTotal
        from detalle_ingresos di
        inner join productos p
        on di.IdProducto = p.IdProducto
        inner join unidad_medidas u
        on p.IdUnidadMedida=u.IdUnidadMedida
        inner join ingresos i
        on di.idIngreso=i.IdIngreso
        where di.IdIngreso = '.$IdIngreso.' ');

        $total = DetalleIngreso::where('IdIngreso', $IdIngreso)->sum('CostoTotal');

        return view('ingresos.detalles', compact('detalle_i', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdIngreso)
    {
        try{
            DB::beginTransaction();
            $ingresos = Ingreso::all();
            $ingresos = Ingreso::find($IdIngreso);
            return view('ingresos.edit', compact('ingresos'));
            DB::commit();
        }catch (Exception $e){
            dd($e);
            DB::rollBack();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        try{
            DB::beginTransaction();
            request()->validate([
                'created_at' => 'required'
            ]);
            $ingreso->created_at = $request->created_at;
            $ingreso->save();
            return redirect('ingresos')->with('success', 'Ingreso actualizado!!');
            DB::commit();
            }catch (Exception $e){
                dd($e);
                DB::rollBack();
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingreso $ingreso)
    {
        try{
            DB::beginTransaction();
            $ingreso->delete();
            return redirect('ingresos');
            DB::commit();
            }catch (Exception $e){
                dd($e);
                DB::rollBack();
            }

    }
}
