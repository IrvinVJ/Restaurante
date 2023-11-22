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
        @if (session('success'))
        <div class="alert alert-success alert-dimissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

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
                                                <form action="{{ route('ventas.edit',$item->IdVenta) }}" method="GET">
                                                    @can('editar-venta')
                                                    <a class="btn btn-info" href="{{ route('ventas.edit',$item->IdVenta) }}">Editar</a>
                                                    @endcan
                                                </form>

                                                <form action="{{ route('ventas.show',$item->IdVenta) }}" method="GET">
                                                    <a class="btn btn-info" href="{{ route('ventas.show',$item->IdVenta) }}">Imprimir Ticket</a>
                                                </form>

                                                <form action="{{ route('ventas.destroy',$item->IdVenta) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-venta')
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
        } );
      </script>
@stop
