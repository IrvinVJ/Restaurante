@extends('adminlte::page')

@section('title', 'Productos')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        @if (session('datos'))
        <div class="alert alert-success alert-dimissible fade show mt-3" role="alert">
            {{ session('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-producto')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearProducto">Nuevo</button>
                            @endcan
                            <br><br>
                            @include('productos.ModalCrear')

                            <table class="table table-striped mt-2" id="tblProductos">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Producto</th>
                                    <th style="color:#fff;">Stock</th>
                                    <th style="color:#fff;">Unidad de Medida</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($productos as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdProducto }}</td>
                                            <td>{{ $item->NombreProducto }}</td>
                                            <td>{{ $item->Stock }}</td>
                                            <td>{{ $item->DescripcionUM }}</td>

                                            <td>
                                                <form action="{{ route('productos.edit',$item->IdProducto) }}" method="GET">
                                                    @can('editar-producto')
                                                    <!--<button class="btn btn-info" data-toggle="modal" data-target="#EditarProducto{{$item->IdProducto}}">Editar</button>-->
                                                    <a class="btn btn-info" href="{{ route('productos.edit',$item->IdProducto) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('productos.destroy',$item->IdProducto) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-producto')
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
          $('#tblProductos').DataTable({
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
