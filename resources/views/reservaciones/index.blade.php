@extends('adminlte::page')

@section('title', 'Reservaciones')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reservaciones</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-reservacion')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#CrearReservacion">Nuevo</button>
                            @endcan
                            <br><br>
                            @include('reservaciones.ModalCrear')

                            <table class="table table-striped mt-2" id="tblReservaciones">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Cliente</th>
                                    <th style="color:#fff;">Nro Personas</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Hora</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>

                                <tbody>
                                    @foreach ($reservaciones as $item)
                                        <tr>
                                            <td style="display: none;">{{ $item->IdReservacion }}</td>
                                            <td>{{ $item->NombresCliente.' '.$item->ApellidosCliente }}</td>
                                            <td>{{ $item->NroPersonas }}</td>
                                            <td>{{ $item->Fecha }}</td>
                                            <td>{{ $item->Hora }}</td>

                                            <td>
                                                <form action="{{ route('reservacion.reservacion',$item->IdReservacion) }}" method="GET">
                                                    <button class="btn btn-outline-success">+ Pedido</button>
                                                    <!--<input type="submit" value="+ Pedido" class="btn btn-success" data-toggle="modal" data-target="#CrearPedido">
                                                    <a class="btn btn-success">Ver Detalle</a>-->
                                                </form>

                                                <form action="{{ route('reservaciones.edit',$item->IdReservacion) }}" method="GET">
                                                    @can('editar-reservacion')
                                                    <a class="btn btn-info" href="{{ route('reservaciones.edit',$item->IdReservacion) }}">Editar</a>
                                                    @endcan
                                                </form>
                                                <form action="{{ route('reservaciones.show', $item->IdReservacion) }}" method="GET">
                                                    <input type="submit" value="Detalles" class="btn btn-success">
                                                </form>
                                                <form action="{{ route('reservaciones.destroy',$item->IdReservacion) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-reservacion')
                                                    <button type="submit" class="btn btn-danger btnEliminar">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>



                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@stop

@section('css')

@stop

@section('js')
    <!-- Cargar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
          $('#tblReservaciones').DataTable({
            responsive:true,
            autoWidth:false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Registro no encontrado",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
              'next':'Siguiente',
              'previous':'Anterior'
            }
            },
          });
          // Manejar el clic del botón de eliminar usando delegación de eventos
          $(document).on('click', '.btnEliminar', function(event) {
                event.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borrar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        } );
      </script>
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
@stop
