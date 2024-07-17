<!-- Creando el modal CrearPlato-->
<div class="modal fade" id="CrearPlato">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('platos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="NombrePlato" class="form-label">Nombre del Plato:</label>
                            <input type="text" class="form-control" name="NombrePlato" id="NombrePlato" placeholder="Escribir Nombre del plato..." required>
                        </div>
                        <div class="form-group">
                            <label for="PrecioPlato">Precio:</label>
                        <input type="number" class="form-control" name="PrecioPlato" id="PrecioPlato" placeholder="Escribe el precio del plato..." required>
                        </div>
                        <div class="form-group">
                            <label for="IdCategoriaPlatos">Categoría del Plato:</label><br>
                            <select class="form-control" aria-label="Default select example" name="IdCategoriaPlatos" id="IdCategoriaPlatos" required>

                                @foreach ($cat_plato as $cp)
                                    <option value="{{ $cp->IdCategoriaPlatos }}">{{ $cp->NombreCategoriaPlato }}</option>
                                @endforeach

                            </select>

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
