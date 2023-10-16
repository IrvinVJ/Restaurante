@extends('adminlte::page')

@section('title', 'Presupuesto')

@section('content_header')
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Presupuesto</h3>
        </div>

        <table class="table table-striped mt-2">
            <thead style="background-color:#6777ef">
                <th style="display: none;">ID</th>
                <th style="color:#fff;">Plato</th>
                <th style="color:#fff;">Acciones</th>
            </thead>

            <tbody>
                @foreach ($platos as $item)
                    <tr>
                        <td style="display: none;">{{ $item->IdPlato }}</td>
                        <td>{{ $item->NombrePlato }}</td>

                        <td>
                            <form action="{{ route('presupuesto.show',$item->IdPlato) }}" method="GET">
                                <!--<button class="btn btn-success" data-toggle="modal" data-target="#VerDetalle">Detalle</button>-->
                                <input type="submit" value="Detalles" class="btn btn-success">
                            </form>
                        </td>
                    </tr>



                @endforeach
            </tbody>
        </table>

    </section>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>


@stop
