@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)

@section('content_header')
    
@stop

@section('content')
                        
<form method="GET" action="{{ route('usuarios.create')}} ">
    @csrf
    <br><input type="submit" value="Agregar" class="btn btn-outline-success" data-toggle="modal" data-target="#registerModal">

</form>  <br>

<div class="card">
    
    <div class="card-body">
    <table class="table table-striped dt-responsive nowrap" id="tblUsuarios">
        <thead>
          <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ROL</th>
            <!--<th scope="col">ESTADO</th>
            <th scope="col">FECHA DE REGISTRO</th> -->
            
          </tr>
        </thead>
        <tbody>
            
          @foreach ($usuarios as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->rol}}</td>
                <!--<td>{{$item->estado}}</td>
                <td>{{$item->create_at}}</td>-->
                
                <td>
                  <form action="{{route('usuarios.edit',$item->id)}}" method="get">
                      <input type="submit" value="Editar" class="btn btn-outline-info">
                  </form>
                  <form action="{{route('usuarios.destroy',$item->id)}}" method="post">
                      {{ method_field('DELETE') }}
                      @csrf
                  <input type="submit" value="Borrar" class="btn btn-outline-danger">
                  </form>
                  
                </td>

              </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop