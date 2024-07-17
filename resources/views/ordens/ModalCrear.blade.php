<!-- Creando el modal CrearOrden-->
<div class="modal fade" id="CrearOrden">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('ordens.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="id_mesa" class="form-label">Elija la Mesa:</label>
                            <select class="form-control" aria-label="Default select example" id="id_mesa" name="IdMesa" required>
                                @foreach ($mesas as $m)
                                    @if ($m->IdEstadoMesas == 1) <!-- Evaluando si la mesa está libre -->
                                        <option value="{{ $m->IdMesa }}">{{ $m->IdMesa }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_estado" class="form-label">Seleccione el Estado de la Orden:</label>
                            <select class="form-control" aria-label="Default select example" id="id_estado" name="IdEstadoOrdens" required>
                                @foreach ($est_o as $eo)
                                @if ($eo->IdEstadoOrdens == 1) <!-- Condicionando a que solo aparezca en proceso ya que se está creando un pedido -->
                                    <option value="{{ $eo->IdEstadoOrdens }}">{{ $eo->DescripcionEstadoOrdens }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_plato" class="form-label">Seleccione el Plato:</label>
                            <select class="form-control" aria-label="Default select example" id="id_plato" name="IdPlato" required>
                                @foreach ($platos as $p)
                                    <option value="{{ $p->IdPlato }}">{{ $p->NombrePlato }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="Cantidad" placeholder="Escribe el N° de platos...">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="agregar">+ Agregar Detalle</button>
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
                                <button type="submit" class="btn btn-success" name="btnGuardar" id="btnGuardar"><i class="fa fa-save fa-2x"></i> Registrar</button>
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

        id_mesa= $("#id_mesa option:selected").val();
        id_estado=$("#id_estado option:selected").text();
        plat=$("#id_plato option:selected").text();
        plato=$("#id_plato option:selected").val();
        cantidad= $("#cantidad").val();


        if(id_mesa!="" && id_estado !="" && cantidad!="" && cantidad>0){


        var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="plato[]" value="'+cantidad+' '+plato+' '+id_mesa+'">'+plat+'</td> <td>'+cantidad+'</td> </tr>';
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
        $("#costo_unitario").val("");

     }

    function eliminar(index){

        $("#fila" + index).remove();
    }

</script>
<!-- Cargar SweetAlert2 desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endsection
