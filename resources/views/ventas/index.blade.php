@extends('adminlte::page')

@section('title', 'Ventas')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ventas</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">

                                </div>
                                <div class="col-6" align="right">
                                    <form action="{{ route('ventas.pdf') }}" method="GET">
                                        @can('ver-reporte')
                                            <a class="btn btn-danger" href="{{ route('ventas.pdf') }}" target="_blank"><i class="fa fa-file-pdf"> PDF</i></a>
                                        @endcan
                                    </form>
                                </div>

                            </div>
                            <br>

                            <table class="table table-striped mt-2" id="tblVentas">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Orden</th>
                                    <!--<th style="color:#fff;">Mesa</th>-->
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Tipo Documento</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($ventas as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdVenta }}</td>
                                            <td>{{ $item->IdOrdens }}</td>
                                            @if ($item->IdEstadoVentas == 1)
                                                        <td>
                                                            <h5><span class="badge badge-warning">Pendiente</span></h5>
                                                        </td>
                                            @endif
                                            @if ($item->IdEstadoVentas == 2)
                                                        <td>
                                                            <h5><span class="badge badge-success">Realizada</span></h5>
                                                        </td>
                                            @endif

                                            @if ($item->IdTipoDocumento == 1)
                                                        <td>Boleta</td>
                                            @endif
                                            @if ($item->IdTipoDocumento == 2)
                                                        <td>Factura</td>
                                            @endif
                                            @if ($item->IdTipoDocumento == 3)
                                                        <td>Recibo</td>
                                            @endif

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('ventas.edit',$item->IdVenta) }}" method="GET" style="margin-right: 5px;">
                                                        @can('editar-venta')
                                                        <a class="btn btn-info" href="{{ route('ventas.edit',$item->IdVenta) }}"><i class="fa fa-edit"></i> Editar</a>
                                                        @endcan
                                                    </form>

                                                    @if ($item->IdEstadoVentas == 2)


                                                    <form action="{{ route('ventas.show',$item->IdVenta) }}" method="GET" style="margin-right: 5px;">
                                                        <a class="btn btn-success" href="{{ route('ventas.show',$item->IdVenta) }}"><i class="fa fa-print"></i> Ticket</a>
                                                    </form>

                                                    @endif

                                                    <form action="{{ route('ventas.destroy',$item->IdVenta) }}" method="POST" style="margin-right: 5px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-venta')
                                                        <button type="submit" class="btn btn-danger btnEliminar"><i class="fa fa-trash"></i> Borrar</button>
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
    <!-- Cargar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
          $('#tblVentas').DataTable({
            responsive:true,
            autoWidth:false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Registro no encontrado",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
              'next':'Siguiente',
              'previous':'Anterior'
            }
            },
            //dom: 'Bfrtip',
            /*buttons: [
              {
                  extend:    'excelHtml5',
                  text:      '<i class="fas fa-file-excel"></i>',
                  titleAttr: 'Excel',
                  className: 'btn btn-success'
              },
              {
                  extend:    'pdfHtml5',
                  text:      '<i class="fas fa-file-pdf"></i>',
                  titleAttr: 'PDF',
                  className: 'btn btn-danger'
              },
              {
                  extend:    'print',
                  text:      '<i class="fa fa-print"></i>',
                  titleAttr: 'Imrpimir',
                  className: 'btn btn-info'
              },
            ]
            */
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
        } );
      </script>
      @if(session('success'))
      <script>
          Swal.fire({
              title: '¡Éxito!',
              text: '{{ session('success') }}',
              icon: 'success',
              confirmButtonText: 'Aceptar'
          });
      </script>
      @endif
@stop
