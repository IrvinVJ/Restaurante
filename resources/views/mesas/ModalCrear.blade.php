<!-- Creando el modal CrearMesa-->
<div class="modal fade" id="CrearMesa">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('mesas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%"
                                height="30%">
                        </div>
                        <div class="form-group">
                            <label for="IdEstadoMesas">Estado de Mesa:</label><br>
                            <select class="form-control" aria-label="Default select example" name="IdEstadoMesas" id="IdEstadoMesas" required>

                                @foreach ($est_mesa as $item)
                                    @if ($item->IdEstadoMesas == 1)
                                        <option value="{{ $item->IdEstadoMesas }}">{{ $item->DescripcionEstadoMesas }}
                                        </option>
                                    @endif
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
