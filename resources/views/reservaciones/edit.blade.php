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
                                    <label for="IdCliente">Cliente:</label><br>
                                    <select class="form-control" aria-label="Default select example" name="IdCliente" id="IdCliente" required>
                                        @foreach ($clientes as $item)
                                        @if ($reservacione->IdCliente == $item->IdCliente)
                                            <option value="{{ $item->IdCliente }}" selected style="display: none;">{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</option>
                                        @endif
                                            <option value="{{ $item->IdCliente }}">{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Fecha" class="form-label">Fecha:</label>
                                    <input type="date" class="form-control" name="Fecha" id="Fecha" value="{{ $reservacione->Fecha }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Hora">Hora:</label>
                                <input type="time" class="form-control" name="Hora" id="Hora" value="{{ $reservacione->Hora }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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

    @stop
