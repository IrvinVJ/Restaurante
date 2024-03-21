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
    <title>Reporte de N° Atenciones Diarias</title>
</head>

<body onload="imprimir();">

    <h1 align="center">REPORTE DE N° ATENCIONES DIARIAS</h1>
    <table class="table table-striped mt-2" align="center">
        <thead style="background-color:#6777ef">
            <th style="color:#fff;">Fechas</th>
            <th style="color:#fff;">Cantidad de atenciones</th>
        </thead>

        <tbody style="background-color:#e9ecf0">
            @foreach ($orden_fecha as $item)
                <tr>
                    <td>{{ $item->fechas }}</td>
                    <td style="text-align: center;">{{ $item->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <br><br>
    <h1 align="center"><b>N° ATENCIONES DIARIAS</b></h1>

    <canvas id="ChartAtenciones" width="800" height="200"></canvas>
    <script src="./impresora.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ChartAtenciones').getContext('2d');

    // Obtener datos dinámicamente desde PHP y almacenarlos en un array de JavaScript
    var dataValues = [
        @foreach ($orden_fecha as $item)
            '{{ $item->cantidad }}',
        @endforeach
    ];

    // Obtener las fechas dinámicamente desde PHP y almacenarlas en un array de JavaScript
    var labels = [
        @foreach ($orden_fecha as $item)
            '{{ $item->fechas }}',
        @endforeach
    ];

    // Datos para el gráfico de líneas
    var data = {
        labels: labels,
        datasets: [{
            label: 'Número de Atenciones Diarias',
            data: dataValues,
            borderColor: 'blue', // Color de la línea
            borderWidth: 1
        }]
    };

    // Opciones del gráfico
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Crear el gráfico de líneas
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
</script>

</html>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')


@stop
