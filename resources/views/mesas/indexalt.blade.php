@extends('adminlte::page')

@section('title', 'Mesas')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mesas</h3>
        </div>
        <!--@if (session('success'))
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
        @endif-->

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-mesa')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearMesa"><i class="fa fa-plus"></i> Nuevo</button>
                            @endcan
                            <br><br>
                            @include('mesas.ModalCrear')

                            <table class="table table-striped mt-2" id="tblMesas">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">N° Mesa</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($mesas as $item)
                                        <tr>
                                            <td>{{ $item->IdMesa }}</td>
                                            @if ($item->IdEstadoMesas == 1)
                                            <td><h5><span class="badge badge-success"> {{ $item->DescripcionEstadoMesas }} </span></h5></td>
                                            @endif
                                            @if ($item->IdEstadoMesas == 2 || $item->IdEstadoMesas == 3)
                                            <td><h5><span class="badge badge-warning"> {{ $item->DescripcionEstadoMesas }} </span></h5></td>
                                            @endif


                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('mesas.edit',$item->IdMesa) }}" method="GET" style="margin-right: 5px;">
                                                        @can('editar-mesa')
                                                        <a class="btn btn-info" href="{{ route('mesas.edit',$item->IdMesa) }}"><i class="fa fa-edit"></i> Editar</a>
                                                        @endcan
                                                    </form>
                                                    <form action="{{ route('mesas.destroy',$item->IdMesa) }}" method="POST" style="margin-right: 5px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-mesa')
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
          $('#tblMesas').DataTable({
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
