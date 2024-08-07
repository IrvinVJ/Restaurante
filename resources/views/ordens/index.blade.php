@extends('adminlte::page')

@section('title', 'Ordenes')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Órdenes</h3>
        </div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6" align="right">
                <form action="{{ route('ordens.pdf') }}" method="GET">
                    @can('ver-reporte')
                        <a class="btn btn-danger" href="{{ route('ordens.pdf') }}" target="_blank"><i
                                class="fa fa-file-pdf"> PDF</i></a>
                    @endcan
                </form>
            </div><br><br>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    @can('crear-pedido')
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#CrearOrden"><i class="fa fa-plus"></i> Nuevo</button>
                                    @endcan
                                </div>


                            </div>

                            @include('ordens.ModalCrear')

                            <table class="table table-striped mt-2" id="tblOrdens">
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
                                            @foreach ($mesas as $em)
                                                @if ($item->IdMesa == $em->IdMesa && $em->IdEstadoMesas == 2)
                                                    <td style="display: none;">{{ $item->IdOrdens }}</td>

                                                    <td>{{ $item->IdMesa }}</td>
                                                    @if ($item->IdEstadoOrdens == 1)
                                                        <td>
                                                            <h5><span class="badge badge-warning">En Proceso</span></h5>
                                                        </td>
                                                    @endif
                                                    @if ($item->IdEstadoOrdens == 2)
                                                        <td>
                                                            <h5><span class="badge badge-success">Atendida</span></h5>
                                                        </td>
                                                    @endif
                                                    @if ($item->IdEstadoOrdens == 3)
                                                        <td>
                                                            <h5><span class="badge badge-danger">Anulada</span></h5>
                                                        </td>
                                                    @endif

                                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <form action="{{ route('ordens.show', $item->IdOrdens) }}"
                                                                method="GET" style="margin-right: 5px;">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-eye"></i> <!--Detalle-->
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('ordens.edit', $item->IdOrdens) }}"
                                                                method="GET" style="margin-right: 5px;">
                                                                @can('editar-pedido')
                                                                    <a class="btn btn-info"
                                                                        href="{{ route('ordens.edit', $item->IdOrdens) }}"><i class="fa fa-edit"></i></a>
                                                                @endcan
                                                            </form>
                                                            <form action="{{ route('ordens.destroy', $item->IdOrdens) }}"
                                                                method="POST" style="margin-right: 5px;">
                                                                @csrf
                                                                @method('DELETE')
                                                                @can('borrar-pedido')
                                                                    <button type="submit" class="btn btn-danger btnEliminar"><i class="fa fa-trash"></i></button>
                                                                @endcan
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endforeach

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <label><b>Pedidos de Reservaciones</b></label>

                            <table class="table table-striped mt-2" id="tblOrdens">
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
                                            @foreach ($mesas as $em)
                                                @if ($item->IdMesa == $em->IdMesa && $em->IdEstadoMesas == 3)
                                                    <td style="display: none;">{{ $item->IdOrdens }}</td>

                                                    <td>{{ $item->IdMesa }}</td>
                                                    @if ($item->IdEstadoOrdens == 1)
                                                        <td>
                                                            <h5><span class="badge badge-warning">En Proceso</span></h5>
                                                        </td>
                                                    @endif
                                                    @if ($item->IdEstadoOrdens == 2)
                                                        <td>
                                                            <h5><span class="badge badge-success">Atendida</span></h5>
                                                        </td>
                                                    @endif
                                                    @if ($item->IdEstadoOrdens == 3)
                                                        <td>
                                                            <h5><span class="badge badge-danger">Anulada</span></h5>
                                                        </td>
                                                    @endif

                                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>

                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <form action="{{ route('ordens.show', $item->IdOrdens) }}"
                                                                method="GET" style="margin-right: 5px;">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-eye"></i> <!--Detalle-->
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('ordens.edit', $item->IdOrdens) }}"
                                                                method="GET" style="margin-right: 5px;">
                                                                @can('editar-orden')
                                                                    <a class="btn btn-info"
                                                                        href="{{ route('ordens.edit', $item->IdOrdens) }}"><i class="fa fa-edit"></i></a>
                                                                @endcan
                                                            </form>
                                                            <form action="{{ route('ordens.destroy', $item->IdOrdens) }}"
                                                                method="POST" style="margin-right: 5px;">
                                                                @csrf
                                                                @method('DELETE')
                                                                @can('borrar-orden')
                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                @endcan
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endforeach

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
    <!-- Cargar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#tblOrdens').DataTable({
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
            // Manejar el clic del botón de eliminar usando delegación de eventos
          $(document).on('click', '.btnEliminar', function(event) {
                event.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borrar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

@stop
