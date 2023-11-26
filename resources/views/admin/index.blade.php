@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
@stop

@section('content')

    <div class="section">
        <div class="section-header">
            <h3 class="page__heading"><b>Dashboard</b></h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/usuarios">
                        <div class="card card-stats" style="border-top: 2px solid #6777ef; ">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-user fa-2x"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-primary">
                                        <p><small>Usuarios Registrados: {{ $users }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/ingresos">
                        <div class="card card-stats" style="border-top: 2px solid #ff0000;">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="fas fa-tag fa-2x" style="color:red;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-red">
                                        <p><small>Compras: {{ $ingresos }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/ventas">
                        <div class="card card-stats" style="border-top: 2px solid #47c363;">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="fa fa-chart-line fa-2x" style="color: green;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-success">
                                        <p><small>Ventas: {{ $ventas }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>



            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/mesas">
                        <div class="card card-stats" style="border-top: 2px solid #a52a2a; ">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-table fa-2x" style="color: #a52a2a;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-black" style="color:#a52a2a">
                                        <p><small>Mesas: {{ $mesas }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/ordens">
                        <div class="card card-stats" style="border-top: 2px solid #3abaf4">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="fa fa-pen fa-2x" style="color:#3abaf4;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-info">
                                        <p><small>Pedidos: {{ $pedidos }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/reservaciones">
                        <div class="card card-stats" style="border-top: 2px solid #ffa426;">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="fa fa-calendar-alt fa-2x" style="color: #ffa426"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-warning">
                                        <p><small>Reservaciones: {{ $reservaciones }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>



            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/clientes">
                        <div class="card card-stats" style="border-top: 2px solid  #191d21; ">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-user fa-2x" style="color:  #191d21;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-black" style="color:  #191d21;">
                                        <p><small>Clientes: {{ $clientes }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/platos">
                        <div class="card card-stats" style="border-top: 2px solid rgb(93, 235, 183);">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="fas fa-utensils fa-2x" style="color:rgb(93, 235, 183);"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold text-black" style="color: rgb(93, 235, 183)">
                                        <p><small>Platos: {{ $platos }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/graficos">
                        <div class="card card-stats" style="border-top: 2px solid #101e5f;">
                            <div class="card-body ">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="fa fa-chart-bar fa-2x" style="color: #101e5f;"></i>
                                </div>
                                <div class="stat-text">
                                    <div class="d-inline text-bold" style="color: #101e5f;">
                                        <p><small>Graficos</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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
        <script>
            Swal.fire(
                'Bienvenido al sistema',
                'Haz click para continuar',
                'success'
            )
        </script>
    @stop
