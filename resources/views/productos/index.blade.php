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

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Producto</th>
                                    <th style="color:#fff;">Stock</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                                </thead>

                                <tbody>
                                    @foreach ($productos as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdProducto }}</td>
                                            <td>{{ $item->NombreProducto }}</td>
                                            <td>{{ $item->Stock }}</td>
                                            <td>
                                                <form action="{{ route('productos.destroy',$item->IdProducto) }}" method="POST">                                        
                                                    @can('editar-producto')
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

    <!-- Creando el modal -->
    <div class="modal fade" id="CrearProducto">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('productos.store') }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                        <!-- Aquí va el contenido del modal -->
                            <div class="form-group" align="center">
                                <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="form-label">Nombre del Producto:</label>
                                <input type="text" class="form-control" name="NombreProducto" placeholder="Escribir Nombre del producto..." required>
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad:</label>
                            <input type="number" class="form-control" name="Stock" placeholder="Escribe el N° de produtos..." required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
