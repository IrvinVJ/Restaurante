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
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearProducto">Nuevo</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
