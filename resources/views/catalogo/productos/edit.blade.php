@extends('layouts.app')
@section('content')
<section class="section">
    <h1 class="section__title">Actualizar Producto</h1>

    {!! Form::open(['route' => ['productos.update', $producto->slug], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        @include('catalogo.productos.fragments.form')
        {!! Form::submit('Actualizar producto', ['class' => 'btn btn--accent']) !!}
    {!! Form::close() !!}

    <img src="{{ asset("storage/catalogos_img/{$producto->imagen }") }}" alt="" id="js-img-preview">

</section>
@endsection
