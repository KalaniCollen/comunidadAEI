@extends('layouts.head')
@section('content')
<section class="section">
    <h1 class="section__title">Actualizar Servicio</h1>

    {!! Form::open(['route' => ['servicios.update', $servicio->slug], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @include('catalogo.servicios.fragments.form')
    {!! Form::submit('Actualizar Servicio', ['class' => 'btn btn--accent']) !!}
    {!! Form::close() !!}

    <img src="{{ asset('storage/catalogos_img/defaultProduct.jpg') }}" alt="" id="js-img-preview">

</section>
@endsection
