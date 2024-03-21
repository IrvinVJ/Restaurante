@extends('adminlte::page')

@section('title', 'Platos')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Platos</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    @can('crear-plato')
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#CrearPlato">Nuevo</button>
                                    @endcan
                                </div>
                                <div class="col-6" align="right">
                                    <form action="{{ route('platos.pdf') }}" method="GET">
                                        @can('ver-reporte')
                                            <a class="btn btn-danger" href="{{ route('platos.pdf') }}" target="_blank"><i
                                                    class="fa fa-file-pdf"> PDF</i></a>
                                        @endcan
                                    </form>
                                </div>

                            </div>

                            <br><br>
                            @include('platos.ModalCrear')

                            <table class="table table-striped mt-2" id="tblPlatos">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Plato</th>
                                    <th style="color:#fff;">Precio</th>
                                    <th style="color:#fff;">Categoría</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($platos as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdPlato }}</td>
                                            <td>{{ $item->NombrePlato }}</td>
                                            <td>{{ $item->PrecioPlato }}</td>
                                            <td>{{ $item->NombreCategoriaPlato }}</td>

                                            <td>
                                                <form action="{{ route('platos.edit', $item->IdPlato) }}" method="GET">
                                                    @can('editar-plato')
                                                        <!--<button class="btn btn-info" data-toggle="modal" data-target="#EditarPlato{{ $item->IdPlato }}">Editar</button>-->
                                                        <a class="btn btn-info"
                                                            href="{{ route('platos.edit', $item->IdPlato) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('platos.destroy', $item->IdPlato) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-plato')
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
    <script>
        console.log('Hi!');
    </script>

    <script>
        $(document).ready(function() {
            $('#tblPlatos').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Registro no encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
            });
        });
    </script>
@stop
