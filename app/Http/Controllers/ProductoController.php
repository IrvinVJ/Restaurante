<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use function Laravel\Prompts\select;

class ProductoController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth'); //ya no se le pone esta línea de código prque está en el archivo de rutas web.php

        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    public function index()
    {
        //$productos = Producto::all();
        $um = UnidadMedida::all();
        $productos = DB::select('select p.IdProducto, p.NombreProducto, p.Stock, p.IdUnidadMedida, p.PrecioProducto, u.IdUnidadMedida, u.DescripcionUM from productos p
        inner join unidad_medidas u
        on p.IdUnidadMedida=u.IdUnidadMedida');
        return view('productos.index', compact('productos', 'um'));
    }



    public function pdf()
    {
        $productos = DB::select('select p.IdProducto, p.NombreProducto, p.Stock, p.IdUnidadMedida, p.PrecioProducto, u.IdUnidadMedida, u.DescripcionUM from productos p
        inner join unidad_medidas u
        on p.IdUnidadMedida=u.IdUnidadMedida');
        $total = DetalleIngreso::sum('CostoTotal');

        $ingresos = Ingreso::all();
        $total_ing = DetalleIngreso::selectRaw('IdIngreso, sum(CostoTotal) as total')->groupBy('IdIngreso')->get();

        //$p = [Producto::pluck('NombreProducto')];
        //dd($p);
        // En el controlador, definimos los datos del gráfico y la URL de Quickchart
       /* $datos = [
            'type' => 'bar',
            'data' => [
                'labels' => [[Producto::pluck('NombreProducto')],],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [Producto::pluck('Stock')],
                        'backgroundColor' => [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        'borderColor' => [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        'borderWidth' => 1
                    ]
                ]
            ]
        ];

        $url = 'https://quickchart.io/chart?c=' . urlencode(json_encode($datos));
        */
        // Pasas la URL a la vista
        //return view('productos.pdf', compact('productos', 'total', 'url'));


        $pdf = Pdf::loadView('productos.pdf', compact('productos', 'total'));
        return view('productos.pdf', compact('productos', 'total'));
        return $pdf->stream();
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
        try{
            DB::beginTransaction();
            request()->validate([
                'NombreProducto' => 'required',
                'Stock' => 'required',
                'IdUnidadMedida' => 'required'
            ]);

            $producto = new Producto();
            $producto->NombreProducto = $request->NombreProducto;
            $producto->Stock = $request->Stock;
            $producto->PrecioProducto = $request->PrecioProducto;
            $producto->IdUnidadMedida = $request->IdUnidadMedida;
            $producto->save();
            return redirect('productos')->with('datos', 'Registro guardado satisfactoriamente');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('productos')->with('datos', 'Error al guardar el registro');
        }

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
    public function edit($IdProducto)
    {
        try{
            DB::beginTransaction();
            $producto = Producto::all();
            $producto = Producto::find($IdProducto);
            $um = UnidadMedida::all();
            return view('productos.edit', compact('producto', 'um'));
            DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return redirect('productos')->with('error', 'Error al mostrar el registro');
            }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        try{
            DB::beginTransaction();
            request()->validate([
                'NombreProducto' => 'required',
                'Stock' => 'required',
                'IdUnidadMedida' => 'required'
            ]);

            $producto->NombreProducto = $request->NombreProducto;
            $producto->Stock = $request->Stock;
            $producto->IdUnidadMedida = $request->IdUnidadMedida;
            $producto->save();
            return redirect('productos')->with('success', 'Producto actualizado correctamente');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('productos')->with('error', 'Error al actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try{
            DB::beginTransaction();
            $producto->delete();
            return redirect('productos');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('productos')->with('error', 'Error al eliminar el registro');
        }
    }
}
