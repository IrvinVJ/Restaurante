@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Productos</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('productos.update', $producto->IdProducto) }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                            @csrf
                            {{method_field('PUT')}}

                                    <div class="form-group">
                                        <label for="formGroupExampleInput" class="form-label">Nombre del Producto:</label>
                                        <input type="text" class="form-control" name="NombreProducto" value="{{$producto->NombreProducto}}" placeholder="Escribir Nombre del producto..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cantidad:</label>
                                    <input type="number" class="form-control" name="Stock" value="{{$producto->Stock}}" placeholder="Escribe el N° de produtos..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unidad de Medida:</label><br>
                                        <select class="form-control" aria-label="Default select example" name="IdUnidadMedida" required>
                                            <option disabled value="" selected>-----ELIJA LA UNIDAD DE MEDIDA-----</option>
                                            @foreach ($um as $u)
                                                <option value="{{ $u->IdUnidadMedida }}">{{ $u->DescripcionUM }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    @if(session('datos'))
    <script>
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session('datos') }}',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    </script>
    @endif
@stop
