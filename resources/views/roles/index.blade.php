@extends('adminlte::page')

@section('title', 'Roles')

@section('plugins.Datatables', true)

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
                    <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>
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
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                    @endcan

                                    @can('borrar-rol')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Centramos la paginacion a la derecha -->
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        $(document).ready(function() {
          $('#tblRoles').DataTable({
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
