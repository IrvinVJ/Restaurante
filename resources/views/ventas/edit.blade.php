@extends('adminlte::page')

@section('title', 'Venta')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Estado de Venta</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ventas.update', $ventas->IdVenta) }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                            @csrf
                            {{method_field('PUT')}}

                                    <div class="form-group">
                                        <label for="">Estado de la Venta:</label><br>
                                        <select class="form-control" aria-label="Default select example" name="IdEstadoVentas" required>

                                            @foreach ($est_venta as $item)
                                            @if ($ventas->IdEstadoVentas == $item->IdEstadoVentas)
                                                <option value="{{ $item->IdEstadoventas }}" selected style="display: none;">{{ $item->DescripcionEstadoVentas }}</option>
                                            @endif
                                                <option value="{{ $item->IdEstadoVentas }}">{{ $item->DescripcionEstadoVentas }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Documento:</label><br>
                                        <select class="form-control" aria-label="Default select example" name="IdTipoDocumento" required>

                                            @foreach ($tipo_documento as $item)
                                            @if ($ventas->IdTipoDocumento == $item->IdTipoDocumento)
                                                <option value="{{ $item->IdTipoDocumento }}" selected style="display: none;">{{ $item->DescripcionTipoDocumento }}</option>
                                            @endif
                                                <option value="{{ $item->IdTipoDocumento }}">{{ $item->DescripcionTipoDocumento }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>

                        </form>
                    </div>
                </div>
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
