@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)

@section('content_header')
    
@stop

@section('content')
    <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nombres:</label>
            <input type="text" class="form-control" name="txtnombre" id="formGroupExampleInput" placeholder="Escribir nombre...">
        </div>
        
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Email:</label>
            <input type="text" class="form-control" name="txtemail" id="formGroupExampleInput" placeholder="Escribir email@ejemplo.com...">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Rol:</label>
            <input type="text" class="form-control" name="txtrol" id="formGroupExampleInput" placeholder="Escribir rol...">
        </div>


        <!--<div>
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>-->
    
        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>
        <br>
        
        <div align="center">
            <input type="submit" value="Grabar" class="btn btn-outline-success">
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop