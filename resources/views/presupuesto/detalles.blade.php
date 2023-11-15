@extends('adminlte::page')

@section('title', 'Detalle Ingreso')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle de Presupuesto por Plato para 1 Persona</h3>
        </div>
        <label for=""><b>Plato:</b></label>
                @foreach ($detalle_p as $item)
                <label for="">{{$item->NombrePlato}}</label>
                @break
                @endforeach
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-striped mt-2" id="tblDetalles">
                                <thead style="background-color:#6777ef">
                                    <tr>
                                        <th scope="col" style="color:#fff;">PRODUCTO</th>
                                        <th scope="col" style="color:#fff;">PRECIO</th>
                                        <th scope="col" style="color:#fff;">CANTIDAD</th>
                                        <th scope="col" style="color:#fff;">UNIDAD DE MEDIDA</th>
                                        <th scope="col" style="color:#fff;">SUB TOTALES</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($detalle_p as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdPresupuesto }}</td>

                                            <td>{{ $item->NombreProducto }}</td>
                                            <td>{{ $item->PrecioProducto }}</td>
                                            <td>{{ $item->Cantidad }}</td>
                                            <td align="center">{{ $item->DescripcionUM }}</td>
                                            <td align="right">{{ round($item->CostoTotal,2) }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL A PAGAR:</p>
                                        </th>
                                        <th colspan="4">
                                            <p align="right"><span align="right" id="total">S/. {{round($total,2)}}</span> </p>
                                        </th>
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
