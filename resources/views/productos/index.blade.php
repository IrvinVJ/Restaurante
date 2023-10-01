@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-producto')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearProducto">Nuevo</button>
                            @endcan

                            @include('productos.ModalCrear')

                            <table class="table table-striped mt-2">
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
                                                <form action="{{ route('productos.destroy',$item->IdProducto) }}" method="POST">                                        
                                                    @can('editar-producto')
                                                    <!--<button class="btn btn-info" data-toggle="modal" data-target="#EditarProducto{{$item->IdProducto}}">Editar</button>-->
                                                    <a class="btn btn-info" href="{{ route('productos.edit',$item->IdProducto) }}">Editar</a>
                                                    @endcan
            
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
@stop
