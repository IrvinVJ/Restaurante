@extends('adminlte::page')

@section('title', 'Orden')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Estado de Orden</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ordens.update', $ordens->IdOrdens) }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                            @csrf
                            {{method_field('PUT')}}
                            @foreach ($mesa as $item)
                                <input type="text" name="IdMesa" style="display: none;" value={{$item->IdMesa}}>
                            @endforeach
                                    <div class="form-group">
                                        <label for="IdEstadoOrdens">Estado de la Orden:</label><br>
                                        <select class="form-control" aria-label="Default select example" name="IdEstadoOrdens" id="IdEstadoOrdens" required>

                                            @foreach ($est_ordens as $item)
                                            @if ($ordens->IdEstadoOrdens == $item->IdEstadoOrdens)
                                                <option value="{{ $item->IdEstadoOrdens }}" selected style="display: none;">{{ $item->DescripcionEstadoOrdens }}</option>
                                            @endif
                                                <option value="{{ $item->IdEstadoOrdens }}">{{ $item->DescripcionEstadoOrdens }}</option>
                                            @endforeach

                                        </select>
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
