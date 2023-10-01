<!-- Creando el modal Editar-->
<div class="modal fade" id="EditarProducto{{$producto->IdProducto}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('productos.update', $producto->IdProducto) }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                            <br>
                            <h5>Editar Productos</h5>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Nombre del Producto:</label>
                            <input type="text" class="form-control" name="NombreProducto" value="{{$producto->NombreProducto}}" placeholder="Escribir Nombre del producto..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad:</label>
                        <input type="number" class="form-control" name="Stock" value="{{$producto->Stock}}" placeholder="Escribe el N° de produtos..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Unidad de Medida:</label><br>
                            <select class="form-control" aria-label="Default select example" name="IdUnidadMedida" required>
                                <option disabled value="" selected>-----ELIJA LA UNIDAD DE MEDIDA-----</option>
                                @foreach ($um as $u)
                                    <option value="{{ $u->IdUnidadMedida }}">{{ $u->DescripcionUM }}</option>
                                @endforeach
                            
                            </select>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>