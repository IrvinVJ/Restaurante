<!-- Creando el modal CrearCliente-->
<div class="modal fade" id="CrearCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="Dni" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="Dni" id="Dni" placeholder="Escribir DNI del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="NombresCliente">Nombres:</label>
                        <input type="text" class="form-control" name="NombresCliente" id="NombresCliente" placeholder="Escribe el nombre del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="ApellidosCliente">Apellidos:</label><br>
                            <input type="text" class="form-control" name="ApellidosCliente" id="ApellidosCliente" placeholder="Escribe apellido del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="NroTelefono" class="form-label">Nro de Teléfono:</label>
                            <input type="text" class="form-control" name="NroTelefono" id="NroTelefono" placeholder="Escribir N° Teléfono..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
