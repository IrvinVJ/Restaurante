@extends('adminlte::page')

@section('title', 'Presupuesto')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Presupuesto</h3>
        </div>
        @can('ver-presupuesto')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @can('crear-presupuesto')
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#CrearPresupuesto"><i class="fa fa-plus"></i> Nuevo</button>
                                 @endcan
                                 <br><br>
                                 @include('presupuesto.ModalCrear')
                                <table class="table table-striped mt-2" id="tblPresupuesto">
                                    <thead style="background-color:#6777ef">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Plato</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($platos as $item)
                                            <tr>
                                                <td style="display: none;">{{ $item->IdPlato }}</td>
                                                <td>{{ $item->NombrePlato }}</td>

                                                <td>
                                                    <form action="{{ route('presupuesto.show', $item->IdPlato) }}"
                                                        method="GET">
                                                        <!--<button class="btn btn-success" data-toggle="modal" data-target="#VerDetalle">Detalle</button>-->
                                                        <!--<input type="submit" value="Detalles" class="btn btn-success">-->
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-eye"></i> Detalle</button>
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
        @endcan
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
            $('#tblPresupuesto').DataTable({
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
