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
    <title>Reporte de Ventas por Fecha</title>
</head>

<body onload="imprimir();">

    <h1 align="center">REPORTE DE VENTAS POR FECHAS</h1>
    <table class="table table-striped mt-2" align="center">
        <thead style="background-color:#6777ef">
            <th style="display: none;">ID</th>
            <th style="color:#fff;">FECHA DE VENTA</th>
            <th style="color:#fff;">PRODUCTO</th>
            <th style="color:#fff;">CANTIDAD</th>
            <th style="color:#fff;">COSTO UNITARIO</th>
            <th style="color:#fff;">SUB TOTALES</th>
        </thead>

        <tbody style="background-color:#e9ecf0">
            @foreach ($detalle_o as $item)
                <tr>
                    <td style="display: none;">{{ $item->IdOrdens }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                    <td>{{ $item->NombrePlato }}</td>
                    <td>{{ $item->Cantidad }}</td>
                    <td>{{ $item->PrecioPlato }}</td>
                    <td align="right">{{ round($item->CostoTotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>

            <tr>
                <th colspan="3">
                    <p align="right">TOTAL:</p>
                </th>

                <th colspan="3">
                    <p align="right"><span align="right" id="total_pagar_html">S/. {{ round($total, 2) }}</span> </p>
                </th>
            </tr>

        </tfoot>
    </table>
    <br><br>
    <div class="row">
        <h1 align="center"><b>GRÁFICO VENTAS vs FECHAS</b></h1>
        <canvas id="ChartVentas" width="800" height="200"></canvas>
    </div>

    <script src="./impresora.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ChartVentas').getContext('2d');
    var ChartGastos = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($ventas as $item)
                    ['{{ date('d-m-Y', strtotime($item->created_at)) }}'],
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

</html>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
