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
                            <label for="formGroupExampleInput" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="Dni" placeholder="Escribir DNI del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Nombres:</label>
                        <input type="text" class="form-control" name="NombresCliente" placeholder="Escribe el nombre del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos:</label><br>
                            <input type="text" class="form-control" name="ApellidosCliente" placeholder="Escribe apellido del cliente..." required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Nro de Teléfono:</label>
                            <input type="text" class="form-control" name="NroTelefono" placeholder="Escribir N° Teléfono..." required>
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
