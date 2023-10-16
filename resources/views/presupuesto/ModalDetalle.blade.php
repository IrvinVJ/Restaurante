<!-- Creando el modal DetallePresupuesto-->
<div class="modal fade" id="VerDetalle">
    <div class="modal-dialog">
        <div class="modal-content">

                <div class="modal-body">
                    <div class="box-body">
                    <!-- Aquí va el contenido del modal -->
                        <div class="form-group" align="center">
                            <img src="vendor/adminlte/dist/img/logoRamada.png" alt="" width="30%" height="30%">
                        </div>

                        <div class="form-group">
                            <table class="table table-striped dt-responsive nowrap" id="tblDetallesss">
                                <thead style="background-color:#6777ef">
                                    <tr>
                                      <th scope="col" style="color:#fff;">PRODUCTO</th>
                                      <th scope="col" style="color:#fff;">COSTO</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @for ($i = 0; $i < count($productos_necesarios); $i++)
                                            <tr>
                                                <td>{{ $productos_necesarios[$i] }}</td>
                                            </tr>
                                    @endfor
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <th><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_html">S/. 0.00</span> <input type="hidden" id="total_pagar"></p></th>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>

        </div>
    </div>
</div>
@section('js')

@endsection
