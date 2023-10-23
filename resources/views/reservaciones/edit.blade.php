@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Reservación</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('reservaciones.update', $reservacione->IdReservacion) }}" method="POST">
                                <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label for="">Cliente:</label><br>
                                    <select class="form-control" aria-label="Default select example" name="IdCliente" required>
                                        @foreach ($clientes as $item)
                                        @if ($reservacione->IdCliente == $item->IdCliente)
                                            <option value="{{ $item->IdCliente }}" selected style="display: none;">{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</option>
                                        @endif
                                            <option value="{{ $item->IdCliente }}">{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="form-label">Fecha:</label>
                                    <input type="date" class="form-control" name="Fecha" value="{{ $reservacione->Fecha }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Hora:</label>
                                <input type="time" class="form-control" name="Hora" value="{{ $reservacione->Hora }}" required>
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
