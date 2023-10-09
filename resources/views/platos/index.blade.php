@extends('adminlte::page')

@section('title', 'Platos')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Platos</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-plato')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearPlato">Nuevo</button>
                            @endcan

                            @include('platos.ModalCrear')

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Plato</th>
                                    <th style="color:#fff;">Precio</th>
                                    <th style="color:#fff;">Categoría</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($platos as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdPlato }}</td>
                                            <td>{{ $item->NombrePlato }}</td>
                                            <td>{{ $item->PrecioPlato }}</td>
                                            <td>{{ $item->NombreCategoriaPlato }}</td>

                                            <td>
                                                <form action="{{ route('platos.edit',$item->IdPlato) }}" method="GET">
                                                    @can('editar-plato')
                                                    <!--<button class="btn btn-info" data-toggle="modal" data-target="#EditarPlato{{$item->IdPlato}}">Editar</button>-->
                                                    <a class="btn btn-info" href="{{ route('platos.edit',$item->IdPlato) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('platos.destroy',$item->IdPlato) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-plato')
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
@stop
