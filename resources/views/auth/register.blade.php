@extends('layout')
@section('title','Registrar Usuarios')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Registrar Usuarios</h1>
</div>

<div class="container w-50 border border-primary rounded p-4 mt-3">
    <form action="/register" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombre de Usuario:</label>
                <input type="text" name="name" class="form-control" id="inputNames">
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
            <div class="col-md-6">
                <label for="inputPassword2" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" class="form-control" id="inputPassword2">
            </div>

            <!--
            <div class="col-md-6">
                <label for="inputRole" class="form-label">Rol:</label>
                <select name="role" id="inputRole" class="form-control">
                    <option value="">Seleccione un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>--->
            <div class="col-md-12">
                <input class="btn btn-primary" type="submit" value="Registrar">
            </div>


        </div>

    </form>
</div>

@endsection