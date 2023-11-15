<!-- Creando el modal CrearPresupuesto-->
<div class="modal fade" id="CrearPresupuesto">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('presupuesto.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Elija el Plato:</label>
                            <select class="form-control" aria-label="Default select example" id="id_plato" name="IdPlato" required>
                                @foreach ($platos as $p)
                                        <option value="{{ $p->IdPlato }}">{{ $p->NombrePlato }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Seleccione el Producto:</label>
                            <select class="form-control" aria-label="Default select example" id="id_producto" name="IdProducto" required>
                                @foreach ($productos as $prod)
                                    <option value="{{ $prod->IdProducto }}">{{ $prod->NombreProducto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad:</label>
                        <input type="number" step="0.1" class="form-control" id="cantidad" name="Cantidad" placeholder="Escribe en cuánto del producto necesitas para elaborar el plato...">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="agregar">+ Agregar Producto</button>
                        </div>
                        <div class="form-group">
                            <table class="table table-striped dt-responsive nowrap" id="tblDetalles">
                                <thead>
                                    <tr>
                                      <th scope="col">OPCION</th>
                                      <th scope="col">PLATO</th>
                                      <th scope="col">CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
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

    //$("#guardar").hide();

    function agregar(){

        plat=$("#id_plato option:selected").text();
        plato=$("#id_plato option:selected").val();
        id_producto= $("#id_producto option:selected").val();
        producto=$("#id_producto option:selected").text();
        cantidad= $("#cantidad").val();


        if(plato!="" && id_producto !="" && cantidad!="" && cantidad>0){


        var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto[]" value="'+cantidad+' '+plato+' '+id_producto+'">'+producto+'</td> <td>'+cantidad+'</td> </tr>';
        cont++;
        limpiar();

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


     }

    function eliminar(index){

        $("#fila" + index).remove();
    }

</script>
@endsection
