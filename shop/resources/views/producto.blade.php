<!-- para traer la plantilla -->
@extends('layout.app')

@section('title','producto')
@section('meta-descriptio', 'About meta description')

<!-- imprimimos el texto que queremos aqui -->
@section('content')
    <h1>Producto</h1>

    <Tienda/>
    <script type="module" src="http://localhost:3002/js/app.js"></script>


    <br><a href="/product/create">Create new post</a>
@endsection