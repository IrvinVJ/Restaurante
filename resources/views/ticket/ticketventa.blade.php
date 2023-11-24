<!DOCTYPE html>
<html>

<head>
    <meta charset="gb18030">

    <link rel="stylesheet" href="{{ asset('css/imprimirBoleto9cm.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">-->
    <script type="text/javascript">
        function imprimir() {
            //window.open()
            window.print();
            //window.close();

            //window.location.href = "{{ url('ventas/venta/create1') }}";
        }
    </script>

<body onload="imprimir();">
    <div class="ticket" id="ticket">

        <br>
        <center>
            <div class="center">

                <h3 style="margin: 0; font-size: 22px">La Ramadita</h3>
                <!--<img style="height: 100px;width: 350px;" src="{{ asset('imagenes/logo/tagle.jpeg') }}">-->
                <!--<img src="{{ asset('imagenes/logo/LOGOMB.jpeg') }}">-->
                <h3 style="margin: 0; font-size: 14px">RUC : 10454940321</h3>
                <h6 style="margin: 0; font-size: 14px">Jr. Bolivar, 201, C.P. San Martín de Porres, San José, Pacasmayo</h6>

            </div>


                <div class="etiq4">BOLETA ELECTRONICA</div><br>


            <div class="etiq4">{{$venta->Serie}} - {{$venta->Correlativo}}</div>

            <div style="margin: 0; font-size: 16px">Fecha de Emision: {{ $venta->created_at }} </div>

        </center>


        <div class="lineas">------------------------------------------------------------------------</div>
        <span class="etiq">Razon Social</span> : <span>{{ $cliente->NombreCompleto }}</span>
        <?php
      if($venta->IdTipoDocumento == 1){ ?>
        <br> <span class="etiq">DNI</span> : <span>{{ $cliente->Dni }}</span>
        <br><span class="etiq">Teléfono</span> : <span>{{ $cliente->NroTelefono}}</span>
        <?php      }
    ?>
        <?php
      if($venta->IdTipoDocumento == 2){ ?>
        <br><span class="etiq">RUC</span> : <span>{{ $cliente->Dni }}</span>
        <br><span class="etiq">Teléfono</span> : <span>{{ $cliente->NroTelefono }}</span>
        <?php      }
    ?>

        <?php
      if($venta->IdTipoDocumento == 3){ ?>
        <br><span class="etiq">Teléfono</span> : <span>{{ $cliente->NroTelefono }}</span>
        <?php      }
    ?>

        <table>
            <thead>
                <tr>
                    <th>DESCRIPCION.</th>
                    <th>CANT</th>
                    <th>P. UNIT</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
           $total = 0;
            foreach ($detalle_v as $de) {
                 $total +=  $de->CostoTotal;
            ?>
                <tr>
                    <td>{{ $de->NombrePlato }}</td>
                    <td style="text-align:center">{{ $de->Cantidad }}</td>
                    <td style="text-align:center">{{ number_format($de->PrecioPlato, 1) }}</td>
                    <td style="text-align:center">{{ number_format($de->CostoTotal, 1) }}</td>
                </tr>
                <?php    } ?>
            </tbody>

        </table>
        <div class="lineas">-------------------------------------------------------------------------</div>
        <div class="montos">

            <?php
              if($venta->IdTipoDocumento == 3){ ?>

            <?php      } else{ ?>

            <span class="etiq2">DESCUENTO</span><span class="puntos">: S/</span><span
                class="moneda">0.00</span>
            @php
                $igv = $total*0.18;
                $Subtotal = $total - $igv;
            @endphp
            <br><span class="etiq2">OP.GRAVADA</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($Subtotal, 2) }}</span>
            <br><span class="etiq2">I.G.V. 18%</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($igv, 2) }} </span>
            <br>
            <div class="lineas">-----------------------------------------------------------------------</div>
            <?php }

         ?>
        </div>





        <br><span class="etiq2">TOTAL</span><span class="puntos">: S/</span><span
            class="moneda"><?php
            echo number_format($total, 1);
            ?></span>
        <br>


        <center>
            <div class="center">
                <br>
                <?php
      if($venta->IdTipoDocumento == 1){?>
                Representacion impresa de la Boleta Electronica.
                <?php  }
      if($venta->IdTipoDocumento == 2){?>
                Representacion impresa de la Factura Electronica.
                <?php   }
    ?>

                <?php
      if($venta->IdTipoDocumento != 3){ ?>
                <br>Podra ser consultada en
                https://ww1.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consulta
                <?php      }
        ?>


                <br>Fecha de Emision:{{ date("d-m-Y", strtotime($venta->created_at)) }}
                <br>
                <br>
                GRACIAS POR SU COMPRA
            </div>
        </center>

    </div>
    <label>.</label>
    <script src="./impresora.js"></script>
</body>

</html>
