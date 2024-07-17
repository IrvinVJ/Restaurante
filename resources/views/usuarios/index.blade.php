@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    @can('crear-usuario')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
                            <br><br>
                            <table class="table table-striped mt-2" id="tblUsuarios">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">E-mail</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                  @foreach ($usuarios as $usuario)
                                    <tr>
                                      <td style="display: none;">{{ $usuario->id }}</td>
                                      <td>{{ $usuario->name }}</td>
                                      <td>{{ $usuario->email }}</td>
                                      <td>
                                        @if(!empty($usuario->getRoleNames()))
                                          @foreach($usuario->getRoleNames() as $rolNombre)
                                            <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                          @endforeach
                                        @endif
                                      </td>

                                      <td>
                                        @can('crear-usuario')
                                        <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                                        @endcan

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'class' => 'formEliminar', 'style' => 'display:inline']) !!}
                                          @can('borrar-usuario')
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger btnEliminar']) !!}
                                          @endcan
                                        {!! Form::close() !!}
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
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
            $('#tblUsuarios').DataTable({
                responsive: true,
                autoWidth: false,
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
        });
    </script>
@stop
