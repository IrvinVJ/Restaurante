<!-- Creando el modal CrearProducto-->
<div class="modal fade" id="CrearProducto">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('productos.store') }}" method="POST"> <!-- El POST en el method no es fijo, depende de la acción que se quiera realizar-->
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="NombreProducto" class="form-label">Nombre del Producto:</label>
                            <input type="text" class="form-control" name="NombreProducto" id="NombreProducto" placeholder="Escribir Nombre del producto..." required>
                        </div>
                        <div class="form-group">
                            <label for="Stock">Cantidad:</label>
                        <input type="number" class="form-control" name="Stock" id="Stock" placeholder="Escribe el N° de produtos..." required>
                        </div>
                        <div class="form-group">
                            <label for="IdUnidadMedida">Unidad de Medida:</label><br>
                            <select class="form-control" aria-label="Default select example" name="IdUnidadMedida" id="IdUnidadMedida" required>

                                @foreach ($um as $u)
                                    <option value="{{ $u->IdUnidadMedida }}">{{ $u->DescripcionUM }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="PrecioProducto">Precio del Producto:</label>
                        <input type="float" class="form-control" name="PrecioProducto" id="PrecioProducto" placeholder="Escribe el precio del produto..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
