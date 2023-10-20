@extends('adminlte::page')

@section('title', 'Detalle Ingreso')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle de Presupuesto por Plato para 1 Persona</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <tr>
                                      <th scope="col" style="color:#fff;">PRODUCTO</th>
                                      <th scope="col" style="color:#fff;">COSTO</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @for ($i = 0; $i < $tamañop; $i++)
                                        <tr>
                                            <td>{{ $productos_necesarios[$i] }}</td>
                                            <td><p align="right">{{ round($CostoUnitario[$i],3) }}</p></td>
                                        </tr>
                                    @endfor


                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_html">S/. </span> {{round($CostoTotal,2)}}</p></th>
                                    </tr>

                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>


@stop
