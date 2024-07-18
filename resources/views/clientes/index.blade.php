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

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-cliente')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearCliente"><i class="fa fa-plus"></i> Nuevo</button>
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
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('clientes.edit',$item->IdCliente) }}" method="GET" style="margin-right: 5px;">
                                                        @can('editar-cliente')
                                                        <a class="btn btn-info" href="{{ route('clientes.edit',$item->IdCliente) }}"><i class="fa fa-edit"></i> Editar</a>
                                                        @endcan
                                                    </form>
                                                    <form action="{{ route('clientes.destroy',$item->IdCliente) }}" method="POST" style="margin-right: 5px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-cliente')
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
