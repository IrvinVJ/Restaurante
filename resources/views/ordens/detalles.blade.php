@extends('adminlte::page')

@section('title', 'Detalle Orden')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle Orden</h3>
        </div>
        <label for=""><b>N° de Mesa:</b></label>
                @foreach ($detalle_o as $item)
                <label for="">{{$item->IdMesa}}</label>
                @break
                @endforeach
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">PLATO</th>
                                    <th style="color:#fff;">CANTIDAD</th>
                                    <th style="color:#fff;">COSTO UNITARIO</th>
                                    <th style="color:#fff;">SUB TOTALES</th>
                                </thead>

                                <tbody>

                                        @foreach ($detalle_o as $item)
                                            <tr>
                                                <td style="display: none;">{{ $item->IdDetalleOrdens }}</td>
                                                <td style="display: none;">{{ $item->IdOrdens }}</td>

                                                <td>{{ $item->NombrePlato }}</td>
                                                <td>{{ $item->Cantidad }}</td>
                                                <td>{{ $item->PrecioPlato }}</td>
                                                <td align="right">{{ round($item->CostoTotal,2) }}</td>
                                            </tr>
                                        @endforeach


                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th colspan="3"><p align="right">TOTAL PAGAR:</p></th>

                                        <th colspan="3"><p align="right"><span align="right" id="total_pagar_html">S/. {{round($total,2)}}</span> </p></th>
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
