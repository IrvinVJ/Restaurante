@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Clientes</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('clientes.update', $cliente->IdCliente) }}" method="POST">
                                <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" name="Dni" value="{{ $cliente->Dni }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres:</label>
                                    <input type="text" class="form-control" name="NombresCliente"
                                        value="{{ $cliente->NombresCliente }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos:</label><br>
                                    <input type="text" class="form-control" name="ApellidosCliente"
                                        value="{{ $cliente->ApellidosCliente }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="form-label">Nro de Teléfono:</label>
                                    <input type="text" class="form-control" name="NroTelefono"
                                        value="{{ $cliente->NroTelefono }}" required>
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
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
