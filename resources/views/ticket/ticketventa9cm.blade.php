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

                <h3 style="margin: 0; font-size: 22px">{{ $empresa->EMPR_NombreComercial }}</h3>
                <!--<img style="height: 100px;width: 350px;" src="{{ asset('imagenes/logo/tagle.jpeg') }}">-->
                <!--<img src="{{ asset('imagenes/logo/LOGOMB.jpeg') }}">-->
                <h3 style="margin: 0; font-size: 14px">RUC : {{ $empresa->EMPR_Numero }}</h3>
                <h6 style="margin: 0; font-size: 14px">{{ $datosalmacen->ALM_Direccion }}</h6>
                <h4 style="margin: 0; font-size: 14px">{{ $datosalmacen->ALM_Nombre }}</h4>

            </div>


                <div class="etiq4">BOLETA ELECTRONICA</div><br>


            <div class="etiq4">{{ $UbiDoc }} - {{ $NumDoc }}</div>

            <div style="margin: 0; font-size: 16px">Fecha de Emision: {{ $ventae->fechaVenta }} Hora:
                {{ $ventae->fechaVentaT }}</div>

        </center>


        <div class="lineas">------------------------------------------------------------------------</div>
        <span class="etiq">Razon Social</span> : <span>{{ $ventae->cliente }}</span>
        <?php
      if($ventae->tipoDoc == "BOL"){ ?>
        <br> <span class="etiq">DNI</span> : <span>{{ $ventae->clienteNumero }}</span>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>
        <?php      }
    ?>
        <?php
      if($ventae->tipoDoc == "FAC"){ ?>
        <br><span class="etiq">RUC</span> : <span>{{ $ventae->clienteNumero }}</span>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>
        <?php      }
    ?>

        <?php
      if($ventae->tipoDoc == "PRO"){ ?>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>
        <?php      }
    ?>

      <br><span class="etiq">Cond.Pago </span>   : <span> CONTADO</span></p>

        <br><span class="etiq">Descripción</span> : <span>{{ $ventae->VEN_Decripcion }}</span></p>

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
            foreach ($detallese as $de) {
                 $total +=  $de->subtotal;
            ?>
                <tr>
                    <td>{{ $de->articulo }}</td>
                    <td style="text-align:center">{{ $de->cantidad }}</td>
                    <td style="text-align:center">{{ number_format($de->precio_venta, 1) }}</td>
                    <td style="text-align:center">{{ number_format($de->subtotal, 1) }}</td>
                </tr>
                <?php    } ?>
            </tbody>

        </table>
        <div class="lineas">-------------------------------------------------------------------------</div>
        <div class="montos">

            <?php
              if($ventae->tipoDoc == "PRO"){ ?>

            <?php      } else{ ?>

            <span class="etiq2">DESCUENTO</span><span class="puntos">: S/</span><span
                class="moneda">{{ $ventae->total_descuento }}</span>
            <br><span class="etiq2">OP.GRAVADA</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($Subtotal, 2) }}</span>
            <br><span class="etiq2">OP.EXONERADA</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($montogravado, 2) }}</span>
            <br><span class="etiq2">I.G.V. 18%</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($igv, 2) }} </span>
            <br>
            <div class="lineas">-----------------------------------------------------------------------</div>
            <?php }

         ?>
            <!--    <br><span class="etiq2">  IMPORTE TOTAL</span><span class="puntos">: S/</span><span class="moneda">{{ number_format($ventae->total_venta - $ventae->total_descuento, 1) }}</span>-->
        </div>


        <!--<span>TOTAL DE UNIDADES</span><span class="puntos">: </span>-->



        <!--<br><span class="etiq2">TOTAL</span><span class="puntos">: S/</span><span class="moneda">{{ number_format($ventae->total_venta - $ventae->total_descuento, 2) }}</span>-->
        <br><span class="etiq2">TOTAL</span><span class="puntos">: S/</span><span
            class="moneda"><?php
            echo number_format($total, 1);
            ?></span>
        <br>

        <center>


            <?php
    if($calificarventa->VEN_TipoPago == "2"){?>
            <div class="recuadro" style="width: 9.0cm; padding: 5px; margin-top:5px">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width:70px;"></th>
                        </tr>
                    </thead>
                    <tBody>
                        <tr>
                            <td>DIAS DE ESPERA</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_Frecuencia }}</td>
                        </tr>
                        <tr>
                            <td>FECHA DE ENTREGA</td>
                            <td style="text-align:center">{{ $datosdecuenta->FECHAEMISION }}</td>
                        </tr>
                        <tr>
                            <td>A CUENTA</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_MontoAbonado }}</td>
                        </tr>
                        <tr>
                            <td>SALDO</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_MontoFaltante }}</td>
                        </tr>
                        <tr>
                            <td>FECHA DE PAGO</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_FechaVencimiento }}</td>
                        </tr>
                        <tr>
                            <td>OBSERVACIONES</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_Descripcion }}</td>
                        </tr>
                    </tBody>
                </table>
            </div>
            <?php     } ?>


        </center>
        

        <center>
            {!! QrCode::size(150)->generate($codi) !!}
        </center>

        <center>
            <div class="center">
                <br>
                <?php
      if($ventae->tipoDoc == "BOL"){?>
                Representacion impresa de la Boleta Electronica.
                <?php  }
      if($ventae->tipoDoc == "FAC"){?>
                Representacion impresa de la Factura Electronica.
                <?php   }
    ?>

                <?php
      if($ventae->tipoDoc != "PRO"){ ?>
                <br>Podra ser consultada en
                https://ww1.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consulta
                <?php      }
        ?>

                <br>CAJERO : {{ $ventae->EMP_Codigo }}
                <br>Fecha de Emision:{{ $ventae->fechaVenta }} Hora: {{ $ventae->fechaVentaT }}
                <!--<br>GRACIAS POR SU COMPRA -->
                <!--<br> No hay devolucion de dinero. Todo cambio es dentro de las 48 horas por falla de fabrica previa presentación del comprobante de pago-->
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
