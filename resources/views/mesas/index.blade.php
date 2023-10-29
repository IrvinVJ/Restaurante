@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mesas</h3>
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
                            @can('crear-mesa')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearMesa">Nuevo</button>
                            @endcan

                            @include('mesas.ModalCrear')

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">N° Mesa</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($mesas as $item)
                                        <tr>
                                            <td>{{ $item->IdMesa }}</td>
                                            <td>{{ $item->DescripcionEstadoMesas }}</td>

                                            <td>
                                                <form action="{{ route('mesas.edit',$item->IdMesa) }}" method="GET">
                                                    @can('editar-mesa')
                                                    <a class="btn btn-info" href="{{ route('mesas.edit',$item->IdMesa) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('mesas.destroy',$item->IdMesa) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-mesa')
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
