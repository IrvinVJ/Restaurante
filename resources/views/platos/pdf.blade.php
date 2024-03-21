<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="^6^"></script>

    <script type="text/javascript">
        function imprimir() {
            //window.open()
            window.print();
            //window.close();

            //window.location.href = "{{ url('ventas/venta/create1') }}";
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Platos con mayor demanda</title>
</head>
<body onload="imprimir();">


    <br><br>
    <h1 align="center"><b>PLATOS CON MAYOR DEMANDA</b></h1>

    <canvas id="ChartPlatos" width="400" height="400"></canvas>
    <script src="./impresora.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ChartPlatos').getContext('2d');
    var ChartGastos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($platos as $item)
                    ['{{ $item->NombrePlato }}'],
                @endforeach
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    @foreach ($total_platos as $item)
                            ['{{ $item->cant_platos_pedidos }}'],
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
</html>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')


@stop
