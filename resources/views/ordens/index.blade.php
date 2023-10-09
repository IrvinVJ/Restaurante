@extends('adminlte::page')

@section('title', 'Ordenes')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Órdenes</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-orden')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearOrden">Nuevo</button>
                            @endcan

                            @include('ordens.ModalCrear')

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Mesa</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($ordens as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdOrdens }}</td>
                                            <td>{{ $item->IdMesa }}</td>
                                            <td>{{ $item->IdEstadoOrdens }}</td>
                                            <td>{{ $item->created_at }}</td>

                                            <td>
                                                <form action="{{ route('ordens.show',$item->IdOrdens) }}" method="GET">
                                                    <input type="submit" value="Detalles" class="btn btn-success">
                                                    <!--<a class="btn btn-success">Ver Detalle</a>-->
                                                </form>
                                                <form action="{{ route('ordens.edit',$item->IdOrdens) }}" method="GET">
                                                    @can('editar-orden')
                                                    <a class="btn btn-info" href="{{ route('ordens.edit',$item->IdOrdens) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('ordens.destroy',$item->IdOrdens) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-orden')
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
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
    <script> console.log('Hi!'); </script>


@stop