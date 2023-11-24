@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
<script src="^6^"></script>
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Gráficos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center"><b>PRODUCTO vs STOCK</b></h5>
                            <canvas id="myChart" width="600" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center"><b>GASTOS vs FECHAS</b></h5>
                            <canvas id="ChartGastos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center"><b>VENTAS vs FECHAS</b></h5>
                            <canvas id="ChartVentas" width="400" height="400"></canvas>
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
    <script>
        console.log('Hi!');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($productos as $item)
                        ['{{ $item->NombreProducto }}'],
                    @endforeach
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        @foreach ($productos as $item)
                            ['{{ $item->Stock }}'],
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

<script>
    var ctx = document.getElementById('ChartGastos').getContext('2d');
    var ChartGastos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($ingresos as $item)
                    ['{{ date("d-m-Y", strtotime($item->created_at)) }}'],
                @endforeach
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    @foreach ($total as $item)
                            ['{{ $item->total }}'],
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('ChartVentas').getContext('2d');
    var ChartGastos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($ventas as $item)
                    ['{{ date("d-m-Y", strtotime($item->created_at)) }}'],
                @endforeach
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    @foreach ($total_ventas as $item)
                            ['{{ $item->total }}'],
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@stop
