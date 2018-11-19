@extends('layouts.head')
@section('content')
    <section class="section">
        <h1 class="section__title">Agregar Servicio</h1>

        {!! Form::open(['route' => ['servicios.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @include('catalogo.servicios.fragments.form')
            {!! Form::submit('Agregar servicio', ['class' => 'btn btn--accent']) !!}

        {!! Form::close() !!}

        <img src="{{ asset('storage/catalogos_img/defaultService.jpg') }}" alt="" id="js-img-preview">
    </section>
@endsection
