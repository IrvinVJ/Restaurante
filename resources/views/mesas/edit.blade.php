@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Mesas</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('mesas.update', $mesa->IdMesa) }}" method="POST">
                                <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                                @csrf
                                {{ method_field('PUT') }}


                                <div class="form-group">
                                    <label for="">Estado de Mesa:</label><br>
                                    <select class="form-control" aria-label="Default select example" name="IdEstadoMesas"
                                        required>
                                        @foreach ($est_mesa as $item)
                                            @if ($mesa->IdEstadoMesas == $item->IdEstadoMesas)
                                                <option value="{{ $item->IdEstadoMesas }}" selected style="display: none;">
                                                    {{ $item->DescripcionEstadoMesas }}</option>
                                            @endif
                                            <option value="{{ $item->IdEstadoMesas }}">{{ $item->DescripcionEstadoMesas }}
                                            </option>
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
        <script>
            console.log('Hi!');
        </script>
    @stop
