@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mesas</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-mesa')
                                <button class="btn btn-warning" data-toggle="modal" data-target="#CrearMesa">
                                    <i class="fa fa-plus"></i> Nuevo
                                </button>
                            @endcan
                            <br><br>
                            @include('mesas.ModalCrear')

                            <div class="layout">
                                @foreach ($mesas as $item)
                                    <div class="mesa @if ($item->IdEstadoMesas == 1) mesa-success @elseif ($item->IdEstadoMesas == 2 || $item->IdEstadoMesas == 3) mesa-warning @endif">
                                        <img src="{{ asset('vendor/adminlte/dist/img/mesa-restaurante.png') }}" class="img-fluid" alt="Mesa de restaurante">
                                        <h3>Mesa {{ $item->IdMesa }}</h3>
                                        @if ($item->IdEstadoMesas == 1)
                                            <h5><span class="badge badge-success">{{ $item->DescripcionEstadoMesas }}</span></h5>
                                        @elseif ($item->IdEstadoMesas == 2 || $item->IdEstadoMesas == 3)
                                            <h5><span class="badge badge-warning">{{ $item->DescripcionEstadoMesas }}</span></h5>
                                        @endif

                                        <div class="btn-group" role="group">
                                            <form action="{{ route('mesas.edit', $item->IdMesa) }}" method="GET" style="margin-right: 5px;">
                                                @can('editar-mesa')
                                                    <a class="btn btn-info" href="{{ route('mesas.edit', $item->IdMesa) }}">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </a>
                                                @endcan
                                            </form>
                                            <form action="{{ route('mesas.destroy', $item->IdMesa) }}" method="POST" style="margin-right: 5px;">
                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-mesa')
                                                    <button type="submit" class="btn btn-danger btnEliminar">
                                                        <i class="fa fa-trash"></i> Borrar
                                                    </button>
                                                @endcan
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('css')
    <link rel="stylesheet" href="/css/mystyles.css">
@stop

@section('js')
    <!-- Cargar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Manejar el clic del botón de eliminar usando delegación de eventos
    $(document).ready(function() {
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
