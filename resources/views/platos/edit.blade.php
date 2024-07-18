@extends('adminlte::page')

@section('title', 'Platos')

@section('content_header')
@stop

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Platos</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('platos.update', $plato->IdPlato) }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                            @csrf
                            {{method_field('PUT')}}

                                    <div class="form-group">
                                        <label for="formGroupExampleInput" class="form-label">Nombre del Plato:</label>
                                        <input type="text" class="form-control" name="NombrePlato" value="{{$plato->NombrePlato}}" placeholder="Escribir Nombre del Plato..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Precio del Plato:</label>
                                    <input type="number" class="form-control" name="PrecioPlato" value="{{$plato->PrecioPlato}}" placeholder="Escribe el precio del plato..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Categoría del Plato:</label><br>
                                        <select class="form-control" aria-label="Default select example" name="IdCategoriaPlatos" required>

                                            @foreach ($cat_plato as $cp)
                                            @if ($plato->IdCategoriaPlatos == $cp->IdCategoriaPlatos)
                                            <option value="{{ $cp->IdCategoriaPlatos }}" selected style="display: none;">{{ $cp->NombreCategoriaPlato }}</option>
                                            @endif
                                                <option value="{{ $cp->IdCategoriaPlatos }}">{{ $cp->NombreCategoriaPlato }}</option>
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
