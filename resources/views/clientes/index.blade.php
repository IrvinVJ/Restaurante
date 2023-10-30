@extends('adminlte::page')

@section('title', 'Clientes')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Clientes</h3>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dimissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning alert-dimissible fade show mt-3" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-cliente')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearCliente">Nuevo</button>
                            @endcan
                            <br><br>
                            @include('clientes.ModalCrear')

                            <table class="table table-striped mt-2" id="tblClientes">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">DNI</th>
                                    <th style="color:#fff;">Nombres</th>
                                    <th style="color:#fff;">Apellidos</th>
                                    <th style="color:#fff;">Teléfono</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($clientes as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdCliente }}</td>
                                            <td>{{ $item->Dni }}</td>
                                            <td>{{ $item->NombresCliente }}</td>
                                            <td>{{ $item->ApellidosCliente }}</td>
                                            <td>{{ $item->NroTelefono }}</td>

                                            <td>
                                                <form action="{{ route('clientes.edit',$item->IdCliente) }}" method="GET">
                                                    @can('editar-cliente')
                                                    <a class="btn btn-info" href="{{ route('clientes.edit',$item->IdCliente) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('clientes.destroy',$item->IdCliente) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-cliente')
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
          $('#tblClientes').DataTable({
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
          });
        } );
      </script>
@stop
