@extends('index')
@section('title','Presentaciones')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
@section('h1_title','Buscar Presentaciones')
@section('content')

<!---Contenido--->
<ul>
    @foreach ($presentaciones as $presentacion)
    <li>{{$presentacion->presentacion}}</li>
    @endforeach
</ul>

{{$presentaciones->links()}}

@endsection

@section('footer')
@endsection

@section('scripts')