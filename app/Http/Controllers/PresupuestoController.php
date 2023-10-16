<?php

namespace App\Http\Controllers;

use App\Models\plato;
use App\Models\presupuesto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Type\Integer;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
    }


    public function show($IdPlato)
    {
        $producto = Producto::all();
        $presupuesto = new presupuesto();
        $productos_necesarios = array();
        $CostoUnitario = array();


        //$CostoTotal = array();
        //$platos = plato::all();

        $aceite = 11.50; //Precio x Litro
        $aceite_oliva = 31; //Precio x Litro
        $ajo = 10.90;   //Precio x Kg
        $sal = 2.20;    //Precio x Kg
        $arroz = 5;  //Precio x Kg
        $cebolla = 4;    //Precio x Kg
        $aji_amarillo = 12.30;  //Precio x Kg
        $aji_panca = 56;    //Precio x Kg   ---Precio x 250g = 14
        $tomate = 5.70; //Precio x Kg
        $oregano = 2.10;    //Precio x Unidad (bolsa de 10g)
        $hoja_laurel = 25;  //Precio x Unidad (bolsa de 250g)
        $achiote_molido = 2.50; //Precio x Unidad (bolsa de 18g)
        $vino_blanco = 47.90;   //Precio x Unidad (botella de 750ml)
        $vinagre_blanco = 4.80; //Precio x Unidad (botella de 1L)
        $mixtura_mariscos = 16.90;  //Precio x Unidad (bolsa de 500g)
        $pimienta = 3.60;   //Precio x Unidad (bolsa de 18g)
        $tramboyo = 20;     //Precio x Kg
        $bonito = 6.90;     //Precio x Kg
        $corvina = 49.90;   //Precio x kg
        $culantro = 2.30;   //Precio x Unidad (culantro atado)
        $perejil = 0.60;    // PRecio x Unidad (perejil atado)
        $kion = 6;      //Precio x Kg
        $limon = 8; //Precio x Kg
        $pimiento = 10.69;  //Precio x Kg
        $pota = 23;     //Precio x Kg
        $malaya = 31.90;    //Precio x Kg
        $rocoto = 1;    //Precio x Unidad
        $mejillones = 10.90;    //Precio x Unidad (bolsa de 300g)
        $vieiras = 19.80;       //Precio x Kg
        $harina = 9.10;         //Precio x Unidad (bolsa de 1 kg)
        $maracuya = 5;          //Precio x Kg
        $naranja = 5;        //Precio x Kg
        $cebada = 4.80;     //Precio x Kg
        $azucar = 5.30;     //Precio x Kg

        switch ($IdPlato) {
            case 1:
                //CEVICHE MIXTO
                //$presupuesto -> IdPlato = $IdPlato;
                $productos_necesarios=['Aceite','Ajo','Sal','Cebolla','Mixtura de Mariscos'];
                $CostoUnitario = [($aceite*0.0103),($ajo*0.21),($sal*0.01),($cebolla*0.05),($mixtura_mariscos*1.25)];
                $CostoTotal = (($aceite*0.0103)+($ajo*0.21)+($sal*0.01)+($cebolla*0.05)+($mixtura_mariscos*1.25));
                //$productos_necesarios[]=[2,3,4,5,11];
                //$presupuesto -> IdProducto = $productos_necesarios;
                /*$presupuesto -> IdProducto = 2;
                $presupuesto -> IdProducto = 3;
                $presupuesto -> IdProducto = 4;
                $presupuesto -> IdProducto = 5;
                $presupuesto -> IdProducto = 11;*/
                //$presupuesto -> CostoUnitario = (($aceite*0.0103)+($ajo*0.21)+($sal*0.01)+($cebolla*0.05)+($mixtura_mariscos*1.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);

                //dd($productos_necesarios, $tamañop);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 2:
                //CEVICHE DE POTA
                //$presupuesto -> IdPlato = $IdPlato;
                $productos_necesarios=['Aceite','Ajo','Sal','Cebolla','Pota'];
                $CostoUnitario = [($aceite*0.0103),($ajo*0.21),($sal*0.01),($cebolla*0.05),($pota*0.75)];
                $CostoTotal = (($aceite*0.0103)+($ajo*0.21)+($sal*0.01)+($cebolla*0.05)+($pota*0.75));
                //$productos_necesarios[]=[2,3,4,5,25];
                //$presupuesto -> IdProducto = $productos_necesarios;
                //$presupuesto -> CostoUnitario = (($aceite*0.0103)+($ajo*0.21)+($sal*0.01)+($cebolla*0.05)+($pota*0.75));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 3:
                //SUDADO DE TRAMBOYO
                //$presupuesto -> IdPlato = $IdPlato;
                $productos_necesarios=['Tramboyo','Culantro','Aji Amarillo','Kion','Ajo','Tomate','Limon','Sal','Pimienta','Cebolla','Pimiento','Rocoto'];
                $CostoUnitario = [($tramboyo),($culantro*0.125),($aji_amarillo*0.014),($kion*0.000375),($ajo*0.21),($tomate*0.5),($limon*0.135),($sal*0.01),($pimienta*0.01),($cebolla*0.05),($pimiento*0.075),($rocoto*0.25)];
                $CostoTotal = (($tramboyo)+($culantro*0.125)+($aji_amarillo*0.014)+($kion*0.000375)+($ajo*0.21)+($tomate*0.5)+($limon*0.135)+($sal*0.01)+($pimienta*0.01)+($cebolla*0.05)+($pimiento*0.075)+($rocoto*0.25));
                //$productos_necesarios[]=[13,14,6,15,3,7,16,4,12,5,17];
                //$presupuesto -> IdProducto = $productos_necesarios;
                //$presupuesto -> CostoUnitario = (($tramboyo)+($culantro*0.125)+($aji_amarillo*0.014)+($kion*0.000375)+($ajo*0.21)+($tomate*0.5)+($limon*0.135)+($sal*0.01)+($pimienta*0.01)+($cebolla*0.05)+($pimiento*0.075)+($rocoto*0.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 4:
                //ARROZ CON MARISCOS
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($aji_amarillo*0.03)+($tomate*0.5)+($oregano*0.0625)+($hoja_laurel*0.0039)+($achiote_molido*0.25)+($vino_blanco*0.125)+($mixtura_mariscos)+($arroz*0.25)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01));
                $productos_necesarios=['Aceite','Cebolla','Ajo','Aji Amarillo','Tomate','Oregano','Hoja de Laurel','Achiote Molido','Vino Blanco','Mixtura de Mariscos','Arroz','Culantro','Pimienta','Sal'];
                $CostoUnitario = [($aceite*0.0154),($cebolla*0.05),($ajo*0.21),($aji_amarillo*0.03),($tomate*0.5),($oregano*0.0625),($hoja_laurel*0.0039),($achiote_molido*0.25),($vino_blanco*0.125),($mixtura_mariscos),($arroz*0.25),($culantro*0.0125),($pimienta*0.01),($sal*0.01)];
                $CostoTotal = (($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($aji_amarillo*0.03)+($tomate*0.5)+($oregano*0.0625)+($hoja_laurel*0.0039)+($achiote_molido*0.25)+($vino_blanco*0.125)+($mixtura_mariscos)+($arroz*0.25)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 5:
                //CHICHARRON DE PESCADO
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125));
                $productos_necesarios=['Aceite','Cebolla','Ajo','Culantro','Pimienta','Sal','Harina','Pescado Bonito'];
                $CostoUnitario = [($aceite*0.0154),($cebolla*0.05),($ajo*0.21),($culantro*0.0125),($pimienta*0.01),($sal*0.01),($harina*0.0625),($bonito*0.125)];
                $CostoTotal = (($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 6:
                //MALAYA
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($aceite*0.0154)+($aji_panca*0.031)+($achiote_molido*0.25)+($pimienta*0.01)+($sal*0.01)+($vinagre_blanco*0.0625)+($malaya*0.75));
                $productos_necesarios=['Aceite','Aji Panca','Achiote Molido','Pimienta','Sal','Vinagre Blanco','Malaya'];
                $CostoUnitario = [($aceite*0.0154),($aji_panca*0.031),($achiote_molido*0.25),($pimienta*0.01),($sal*0.01),($vinagre_blanco*0.0625),($malaya*0.75)];
                $CostoTotal = (($aceite*0.0154)+($aji_panca*0.031)+($achiote_molido*0.25)+($pimienta*0.01)+($sal*0.01)+($vinagre_blanco*0.0625)+($malaya*0.75));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 7:
                //PARIHUELA
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($corvina*0.0625)+($mixtura_mariscos*1.25)+($mejillones*0.125)+($vieiras*0.083)+($cebolla*0.05)+($tomate*0.5)+($aji_amarillo*0.03)+($aji_panca*0.031)+($vino_blanco*0.125)+($kion*0.000375)+($pimiento*0.075)+($rocoto*0.25)+($aceite_oliva*0.0154)+($pimienta*0.01)+($sal*0.01)+($limon*0.135)+($perejil*0.25));
                $productos_necesarios=['Pescado Corvina','Mixtura de Mariscos','Mejillones','Vieiras','Cebolla','Tomate','Aji Amarillo','Aji Panca','Vino Blanco','Kion','Pimiento','Rocoto','Aceite de Oliva','Pimienta','Sal','Limon','Perejil'];
                $CostoUnitario = [($corvina*0.0625),($mixtura_mariscos*1.25),($mejillones*0.125),($vieiras*0.083),($cebolla*0.05),($tomate*0.5),($aji_amarillo*0.03),($aji_panca*0.031),($vino_blanco*0.125),($kion*0.000375),($pimiento*0.075),($rocoto*0.25),($aceite_oliva*0.0154),($pimienta*0.01),($sal*0.01),($limon*0.135),($perejil*0.25)];
                $CostoTotal = (($corvina*0.0625)+($mixtura_mariscos*1.25)+($mejillones*0.125)+($vieiras*0.083)+($cebolla*0.05)+($tomate*0.5)+($aji_amarillo*0.03)+($aji_panca*0.031)+($vino_blanco*0.125)+($kion*0.000375)+($pimiento*0.075)+($rocoto*0.25)+($aceite_oliva*0.0154)+($pimienta*0.01)+($sal*0.01)+($limon*0.135)+($perejil*0.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 8:
                //DUO MARINO
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = ((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125)+($cebolla*0.05))*0.85 + ($mixtura_mariscos*0.75));
                $productos_necesarios=['Aceite','Cebolla','Ajo','Culantro','Pimienta','Sal','Harina','Pescado Bonito','Cebolla','Mixtura de Mariscos'];
                $CostoUnitario = [($aceite*0.0154*0.85),($cebolla*0.05*0.85),($ajo*0.21*0.85),($culantro*0.0125*0.85),($pimienta*0.01*0.85),($sal*0.01*0.85),($harina*0.0625*0.85),($bonito*0.125*0.85),($cebolla*0.05*0.85), ($mixtura_mariscos*0.75)];
                $CostoTotal = ((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125)+($cebolla*0.05))*0.85 + ($mixtura_mariscos*0.75));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 9:
                //TRIO MARINO
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125)+($cebolla*0.05))*0.85) + ($mixtura_mariscos*0.75) + ((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($aji_amarillo*0.03)+($tomate*0.5)+($oregano*0.0625)+($hoja_laurel*0.0039)+($achiote_molido*0.25)+($vino_blanco*0.125)+($mixtura_mariscos)+($arroz*0.25)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01))*0.50));
                $productos_necesarios=['Aceite','Cebolla','Ajo','Culantro','Pimienta','Sal','Harina','Pescado Bonito','Mixtura de Mariscos','Aji Amarillo','Tomate','Oregano','Hoja de Laurel','Achiote Molido','Vino Blanco','Arroz'];
                $CostoUnitario = [($aceite*0.0154*0.85+$aceite*0.0154*0.50),($cebolla*0.05*0.85+$cebolla*0.05*0.50),($ajo*0.21*0.85+$ajo*0.21*0.50),($culantro*0.0125*0.85),($pimienta*0.01*0.85+$pimienta*0.01*0.50),($sal*0.01*0.85+$sal*0.01*0.50),($harina*0.0625*0.85),($bonito*0.125*0.85), ($mixtura_mariscos*0.50+$mixtura_mariscos*0.50),($aji_amarillo*0.03*0.50),($tomate*0.5*0.50),($oregano*0.0625*0.50),($hoja_laurel*0.0039*0.50),($achiote_molido*0.25*0.50),($vino_blanco*0.125*0.50),($arroz*0.25*0.50)];
                $CostoTotal = (((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01)+($harina*0.0625)+($bonito*0.125))*0.85) + ($mixtura_mariscos*0.50) + ((($aceite*0.0154)+($cebolla*0.05)+($ajo*0.21)+($aji_amarillo*0.03)+($tomate*0.5)+($oregano*0.0625)+($hoja_laurel*0.0039)+($achiote_molido*0.25)+($vino_blanco*0.125)+($mixtura_mariscos)+($arroz*0.25)+($culantro*0.0125)+($pimienta*0.01)+($sal*0.01))*0.50));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 10:
                //JUGO DE MARACUYA
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($maracuya)+($azucar*0.25));
                $productos_necesarios=['Maracuya','Azucar'];
                $CostoUnitario = [($maracuya),($azucar*0.25)];
                $CostoTotal = (($maracuya)+($azucar*0.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 11:
                //JUGO DE NARANJA
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($naranja)+($azucar*0.25));
                $productos_necesarios=['Naranja','Azucar'];
                $CostoUnitario = [($naranja),($azucar*0.25)];
                $CostoTotal = (($naranja)+($azucar*0.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
            case 12:
                //CEBADA
                //$presupuesto -> IdPlato = $IdPlato;
                //$presupuesto -> CostoUnitario = (($cebada)+($azucar*0.25));
                $productos_necesarios=['Cebada','Azucar'];
                $CostoUnitario = [($cebada)+($azucar*0.25)];
                $CostoTotal = (($cebada)+($azucar*0.25));
                //dd($productos_necesarios, $CostoUnitario, $CostoTotal);
                $tamañop = count($productos_necesarios);
                return view('presupuesto.detalles', compact(['productos_necesarios','CostoUnitario','CostoTotal','tamañop']));
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
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
