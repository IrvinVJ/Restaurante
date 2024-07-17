@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresos</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    @can('crear-ingreso')
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#CrearIngreso">Nuevo</button>
                                    @endcan
                                </div>
                                <div class="col-6" align="right">
                                    <form action="{{ route('ingresos.pdf') }}" method="GET">
                                        @can('ver-reporte')
                                            <a class="btn btn-danger" href="{{ route('ingresos.pdf') }}" target="_blank"><i class="fa fa-file-pdf"> PDF</i></a>
                                        @endcan
                                    </form>
                                </div>

                            </div>


                            @include('ingresos.ModalCrear')

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha de Ingreso</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($ingresos as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdIngreso }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                            <td>
                                                <form action="{{ route('ingresos.show', $item->IdIngreso) }}" method="GET">
                                                    <input type="submit" value="Detalles" class="btn btn-success">
                                                    <!--<a class="btn btn-success">Ver Detalle</a>-->
                                                </form>
                                                <form action="{{ route('ingresos.edit', $item->IdIngreso) }}" method="GET">
                                                    @can('editar-ingreso')
                                                        <a class="btn btn-info"
                                                            href="{{ route('ingresos.edit', $item->IdIngreso) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('ingresos.destroy', $item->IdIngreso) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-ingreso')
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

@stop

@section('js')

@stop
