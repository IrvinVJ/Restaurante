<!-- Creando el modal CrearOrden-->
@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
@stop
@section('content')
    <div class="section-header">
        <h3 class="page__heading" style="background-color: rgb(141, 241, 241);"><b>Agregar Pedido</b></h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <!--Poner datos de a qué reservación se está haciendo el pedido -->
                <label for=""><b>N° de Reservación:</b></label>
                <label for="">{{$reservacione->IdReservacion}}</label>
                <br>
                <label for=""><b>Cliente:</b></label>
                @foreach ($clientes as $item)
                <label for="">{{$item->NombresCliente.' '.$item->ApellidosCliente}}</label>
                @endforeach

            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reservacion.storeorden', $reservacione->IdReservacion) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="row">
                                        <input type="text" name="IdReservacion" style="display: none;" value={{$reservacione->IdReservacion}}>
                                        @foreach ($clientes as $item)
                                            <input type="text" name="IdCliente" style="display: none;" value={{$item->IdCliente}}>
                                        @endforeach
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label for="formGroupExampleInput" class="form-label">Elija la Mesa:</label>
                                                <select class="form-control" aria-label="Default select example"
                                                    id="id_mesa" name="IdMesa" required>
                                                    @foreach ($mesas as $m)
                                                        @if ($m->IdEstadoMesas == 1)
                                                            <!-- Evaluando si la mesa está libre -->
                                                            <option value="{{ $m->IdMesa }}">{{ $m->IdMesa }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput" class="form-label">Seleccione el Estado
                                                    de la
                                                    Orden:</label>
                                                <select class="form-control" aria-label="Default select example"
                                                    id="id_estado" name="IdEstadoOrdens" required>
                                                    @foreach ($est_o as $eo)
                                                        @if ($eo->IdEstadoOrdens == 1)
                                                            <!-- Condicionando a que solo aparezca en proceso ya que se está creando un pedido -->
                                                            <option value="{{ $eo->IdEstadoOrdens }}">
                                                                {{ $eo->DescripcionEstadoOrdens }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput" class="form-label">Seleccione el
                                                    Plato:</label>
                                                <select class="form-control" aria-label="Default select example"
                                                    id="id_plato" name="IdPlato" required>
                                                    @foreach ($platos as $p)
                                                        <option value="{{ $p->IdPlato }}">{{ $p->NombrePlato }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cantidad:</label>
                                                <input type="number" class="form-control" id="cantidad" name="Cantidad"
                                                    placeholder="Escribe el N° de platos...">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success" id="agregar">+ Agregar
                                                    Detalle</button>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <table class="table table-striped dt-responsive nowrap" id="tblDetalles">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">OPCION</th>
                                                            <th scope="col">PLATO</th>
                                                            <th scope="col">CANTIDAD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer form-group row" id="guardar" align="center">

                                        <div class="col-md">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i>
                                                Registrar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#agregar').click(() => {
                agregar();
            })
        });


        var cont = 0;

        //$("#guardar").hide();

        function agregar() {

            id_mesa = $("#id_mesa option:selected").val();
            id_estado = $("#id_estado option:selected").text();
            plat = $("#id_plato option:selected").text();
            plato = $("#id_plato option:selected").val();
            cantidad = $("#cantidad").val();


            if (id_mesa != "" && id_estado != "" && cantidad != "" && cantidad > 0) {


                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                    ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="plato[]" value="' +
                    cantidad + ' ' + plato + ' ' + id_mesa + '">' + plat + '</td> <td>' + cantidad + '</td> </tr>';
                cont++;
                limpiar();

                $('#tblDetalles').append(fila);

            } else {

                // alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");

                Swal.fire({
                    type: 'error',
                    //title: 'Oops...',
                    text: 'Rellene todos los campos del detalle de la compras',

                })

            }

        }

        function limpiar() {

            $("#cantidad").val("");
            $("#costo_unitario").val("");

        }

        function eliminar(index) {

            $("#fila" + index).remove();
        }
    </script>
@endsection
