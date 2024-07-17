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
    <title>Reporte de Compras por Fecha</title>
</head>

<body onload="imprimir();">

    <h1 align="center">REPORTE DE COMPRAS POR FECHAS</h1>
    <table class="table table-striped mt-2" align="center">
        <thead style="background-color:#6777ef">
            <th style="display: none;">ID</th>
            <th style="color:#fff;">FECHA DE COMPRA</th>
            <th style="color:#fff;">PRODUCTO</th>
            <th style="color:#fff;">CANTIDAD</th>
            <th style="color:#fff;">COSTO UNITARIO</th>
            <th style="color:#fff;">SUB TOTALES</th>
        </thead>

        <tbody style="background-color:#e9ecf0">
            @foreach ($detalle_i as $item)
                <tr>
                    <td style="display: none;">{{ $item->IdIngreso }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                    <td>{{ $item->NombreProducto }}</td>
                    <td style="text-align: center;">{{ $item->Cantidad }}</td>
                    <td style="text-align: right;">{{ $item->CostoUnitario }}</td>
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
        <h1 align="center"><b>GRÁFICO COMPRAS vs FECHAS</b></h1>
        <canvas id="ChartGastos" width="800" height="200"></canvas>
    </div>
    <script src="./impresora.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('ChartGastos').getContext('2d');
        var ChartGastos = new Chart(ctx, {
            type: 'line', // tipo de gráfico 'line'
            data: {
                labels: [
                    @foreach ($ingresos as $item)
                        '{{ date('d-m-Y', strtotime($item->created_at)) }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'S/.',
                    data: [
                        @foreach ($total_ing as $item)
                            '{{ $item->total }}',
                        @endforeach
                    ],
                    borderColor: 'blue', // Color de la línea
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color de fondo del área bajo la línea (opcional)
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

@stop
@section('js')


@stop
