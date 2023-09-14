@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="card">
        <div class="card-header">
            <h1>BIENVENIDO AL SISTEMA</h1>
        </div>
        <img class="img-fluid" src="vendor/adminlte/dist/img/logoRamada.png">
    </div>
    
@stop

@section('content')

   <!-- <div class="card">
        <div class="card-header">
            <h1>BIENVENIDO AL SISTEMA</h1>
        </div>

        <div class="card-body">
            <img class="img-fluid" src="img/wallpaper.jpg">
        </div>
    </div>
-->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        Swal.fire(
        'Bienvenido al sistema',
        'Haz click para continuar',
        'success'
        )
    </script>
@stop