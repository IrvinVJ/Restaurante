@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Roles</h3>
    </div>
    @can('crear-rol')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    @can('crear-rol')
                    <a class="btn btn-warning" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Nuevo</a>
                    @endcan

                        <br><br>
                        <table class="table table-striped mt-2" id="tblRoles">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">Rol</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('editar-rol')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                    @endcan

                                    @can('borrar-rol')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'class' => 'formEliminar', 'style'=>'display:inline']) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i> Borrar', ['class' => 'btn btn-danger btnEliminar']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Centramos la paginacion a la derecha-->
                        <div class="pagination justify-content-end">
                            {!! $roles->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </section>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@stop

@section('js')
    <!-- Cargar jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Cargar DataTables desde CDN -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Cargar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
          $('#tblRoles').DataTable({
            responsive:true,
            autoWidth:false,
            language: {
                    lengthMenu: "Mostrar _MENU_ registros por página",
                    zeroRecords: "Registro no encontrado",
                    info: "Mostrando la página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay registros disponibles",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    search: "Buscar:",
                    paginate: {
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                }
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
@stop
