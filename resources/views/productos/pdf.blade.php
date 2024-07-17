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
    <title>Reporte de Inventario</title>
</head>
<body onload="imprimir();">

    <h1 align="center">REPORTE DE INVENTARIO</h1>
    <table class="table table-striped mt-2" id="tblProductos" align="center">
        <thead style="background-color:#6777ef">
            <th style="display: none;">ID</th>
            <th style="color:#fff;">Producto</th>
            <th style="color:#fff;">Stock</th>
            <th style="color:#fff;">Unidad de Medida</th>
           <!-- <th style="color:#fff;">Precio (S/.)</th>
            <th style="color:#fff;">SUB TOTALES</th>-->
        </thead>

        <tbody style="background-color:#e9ecf0">
            @foreach ($productos as $item)
                <tr>
                    <td style="display: none;">{{ $item->IdProducto }}</td>
                    <td>{{ $item->NombreProducto }}</td>
                    <td>{{ $item->Stock }}</td>
                    <td>{{ $item->DescripcionUM }}</td>
                   <!-- <td>{{ $item->PrecioProducto }}</td>
                    <td align="right">{{ $item->Stock * $item->PrecioProducto}}</td> -->
                </tr>



            @endforeach
        </tbody>
        <!--<tfoot >

            <tr>
                <th colspan="3"><p align="right">TOTAL:</p></th>

                <th colspan="3"><p align="right"><span align="right" id="total_pagar_html">S/. {{round($total,2)}}</span> </p></th>
            </tr>

        </tfoot>-->
    </table>
    <br><br>
    <h1 align="center"><b>GRÁFICO PRODUCTO vs STOCK</b></h1>

    <canvas id="myChart" width="600" height="200"></canvas>
    <script src="./impresora.js"></script>
</body>
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
</html>

@section('css')

@stop
@section('js')


@stop
