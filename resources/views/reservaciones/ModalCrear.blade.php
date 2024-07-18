<!-- Creando el modal CrearReservacion-->
<div class="modal fade" id="CrearReservacion">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('reservaciones.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>
                        <div class="form-group">
                            <label for="IdCliente">Cliente:</label><br>
                            <select class="form-control" aria-label="Default select example" name="IdCliente" required>
                                @foreach ($clientes as $item)
                                    <option value="{{ $item->IdCliente }}">{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Fecha" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" name="Fecha" id="Fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="Hora">Hora:</label>
                        <input type="time" class="form-control" name="Hora" id="Hora" required>
                        </div>
                        <div class="form-group">
                            <label for="NroPersonas">NroPersonas:</label>
                        <input type="number" class="form-control" name="NroPersonas" id="NroPersonas" placeholder="Escribe el N° de personas...">
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
