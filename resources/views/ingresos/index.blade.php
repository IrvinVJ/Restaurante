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
                            <div class="row mb-3">
                                <div class="col-6">
                                    @can('crear-ingreso')
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#CrearIngreso"><i class="fa fa-plus"></i> Nuevo</button>
                                    @endcan
                                </div>
                                <div class="col-6 text-right">
                                    @can('ver-reporte')
                                        <a class="btn btn-danger" href="{{ route('ingresos.pdf') }}" target="_blank">
                                            <i class="fa fa-file-pdf"></i> PDF
                                        </a>
                                    @endcan
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
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('ingresos.show', $item->IdIngreso) }}" method="GET" style="margin-right: 5px;">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-eye"></i> Detalles
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('ingresos.edit', $item->IdIngreso) }}" method="GET" style="margin-right: 5px;">
                                                        @can('editar-ingreso')
                                                            <a class="btn btn-info"
                                                                href="{{ route('ingresos.edit', $item->IdIngreso) }}">
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>
                                                        @endcan
                                                    </form>
                                                    <form action="{{ route('ingresos.destroy', $item->IdIngreso) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-ingreso')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i> Borrar
                                                            </button>
                                                        @endcan
                                                    </form>
                                                </div>
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
