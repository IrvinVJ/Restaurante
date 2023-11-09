@extends('adminlte::page')

@section('title', 'Detalle Reservacion')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle Reservación</h3>
        </div>
        <label for=""><b>N° de Reservación:</b></label>
                <label for="">{{$reservacione->IdReservacion}}</label>
                <br>
                <label for=""><b>Cliente:</b></label>
                @foreach ($clientes as $item)
                <label for="">{{$item->NombresCliente.' '.$item->ApellidosCliente}}</label>
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
                                </thead>

                                <tbody>

                                        @foreach ($detalle_r as $item)
                                            <tr>
                                                <td style="display: none;">{{ $item->IdDetalleReservacion }}</td>
                                                <td style="display: none;">{{ $item->IdReservacion }}</td>

                                                <td>{{ $item->NombrePlato }}</td>
                                                <td>{{ $item->Cantidad }}</td>
                                                <td>{{ $item->PrecioPlato }}</td>
                                            </tr>
                                        @endforeach


                                </tbody>
                                <!--<tfoot>

                                    <tr>
                                        <th><p align="right">TOTAL PAGAR:</p></th>

                                        <th><p align="right"><span align="right" id="total_pagar_html">S/. </span> </p></th>
                                    </tr>

                                </tfoot>-->
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
