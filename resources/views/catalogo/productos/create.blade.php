@extends('layouts.app')
@section('content')
<section class="section">
    <h1 class="section__title">Agregar Producto</h1>

    {!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('catalogo.productos.fragments.form')
        {!! Form::submit('Agregar producto', ['class' => 'btn btn--accent']) !!}
    {!! Form::close() !!}

    <img src="{{ asset('storage/catalogos_img/defaultService.jpg') }}" alt="" id="js-img-preview">

</section>
@endsection
