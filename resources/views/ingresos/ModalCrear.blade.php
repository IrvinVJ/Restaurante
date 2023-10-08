<!-- Creando el modal CrearIngreso-->
<div class="modal fade" id="CrearIngreso">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ingresos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Elija el Producto:</label>
                            <select class="form-control" aria-label="Default select example" id="id_producto" name="IdProducto" required>

                                @foreach ($product as $di)
                                    <option value="{{ $di->IdProducto }}">{{ $di->NombreProducto }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="Cantidad" placeholder="Escribe el N° de produtos...">
                        </div>
                        <div class="form-group">
                            <label for="">Costo Unitario:</label><br>
                            <input type="number" class="form-control" id="costo_unitario" name="CostoUnitario" placeholder="Escribe el costo unitario...">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="agregar">+ Agregar Detalle</button>
                        </div>
                        <div class="form-group">
                            <table class="table table-striped dt-responsive nowrap" id="tblDetalles">
                                <thead>
                                    <tr>
                                      <th scope="col">OPCION</th>
                                      <th scope="col">PRODUCTO</th>
                                      <th scope="col">CANTIDAD</th>
                                      <th scope="col">COSTO UNITARIO</th>
                                      <th scope="col">SUB TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>



                                <tfoot>

                                    <tr>
                                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_html">S/. 0.00</span> <input type="hidden" id="total_pagar"></p></th>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer form-group row" id="guardar" align="center">

                            <div class="col-md">
                               <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Registrar</button>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@section('js')
<script type="text/javascript">

    $(document).ready(function(){
            $('#agregar').click(()=>{
                agregar();
            })
    });


    var cont=0;
    total=0;
    subtotal=[];

    $("#guardar").hide();

    function agregar(){

        id_producto= $("#id_producto").val();
        producto= $("#id_producto option:selected").text();
        cantidad= $("#cantidad").val();
        costo_unitario= $("#costo_unitario").val();
        //costo_total= $("#costo_unitario").val()*$("#cantidad").val();
        console.log("gggg");
        if(id_producto !="" && cantidad!="" && cantidad>0 && costo_unitario!=""){

        subtotal[cont]=cantidad*costo_unitario;
        total= total+subtotal[cont];

        //var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto[]" value="'+id_producto+' '+cantidad+' '+costo_unitario+' '+costo_total+'">'+producto+'</td> <td>'+cantidad+'</td> <td>'+costo_unitario+'</td><td>'+costo_total+'</td>   <td>S/.'+subtotal[cont]+' </td></tr>';
        var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto[]" value="'+id_producto+' '+cantidad+' '+costo_unitario+'">'+producto+'</td> <td>'+cantidad+'</td> <td>'+costo_unitario+'</td> <td>S/.'+subtotal[cont]+' </td></tr>';
        cont++;
        limpiar();
        totales();

        evaluar();
        $('#tblDetalles').append(fila);

        }else{

            // alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");

            Swal.fire({
            type: 'error',
            //title: 'Oops...',
            text: 'Rellene todos los campos del detalle de la compras',

            })

        }

    }

    function limpiar(){

        $("#cantidad").val("");
        $("#costo_unitario").val("");

     }

     function totales(){

        $("#total_pagar_html").html("S/. " + total.toFixed(2));
        $("#total_pagar").val(total.toFixed(2));

    }

    function evaluar(){

        if(total>0){

        $("#guardar").show();

        } else{

        $("#guardar").hide();
        }
    }

    function eliminar(index){

        total=total-subtotal[index];

        $("#total_pagar_html").html("S/." + total);
        $("#total_pagar").val(total.toFixed(2));

        $("#fila" + index).remove();
        evaluar();
    }

</script>
@endsection
