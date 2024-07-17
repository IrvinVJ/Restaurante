@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Ingreso</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ingresos.update', $ingresos->IdIngreso) }}" method="POST">
                            <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                            @csrf
                            {{ method_field('PUT') }}
                            <label for=""><b>Fecha de Ingreso:</b></label>
                            <label for="">{{ date('d-m-Y', strtotime($ingresos->created_at)) }}</label>
                            <br>
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" name="created_at"
                                    value="{{ date('d-m-Y', strtotime($ingresos->created_at)) }}" required>
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

@stop

@section('js')

@stop
