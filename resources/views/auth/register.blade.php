@extends('index')
@section('title','Usuarios')
@section('h1_title','Registro de Usuarios')
@section('content')


<div class="container w-75 border border-primary rounded p-4 mt-3">
    <form action="{{route('register')}}" method="POST">
        @csrf

        @if (session('success'))
        <div class="col-12">
            <h5 class="alert alert-success"> {{session('success')}} </h5>
        </div>
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputNames" class="form-label">Nombre de Usuario:</label>
                <input type="text" name="name" class="form-control" id="inputNames">
                <br>
                @error('name')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
                <br>
                @error('email')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
                <br>
                @error('password')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword2" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" class="form-control" id="inputPassword2">
                <br>
                @error('password_confirmation')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
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

@section('footer')
    
@endsection

@section('scripts')