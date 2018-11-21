@extends('layouts.head')
@section('content')
    <section class="section">
        <h1 class="section__title">Agregar Servicio</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['route' => ['servicios.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                @include('catalogo.servicios.fragments.form')

                {!! Form::submit('Agregar servicio', ['class' => 'btn btn--accent']) !!}
                {!! Form::close() !!}
            </div>

            <div class="col-md-6">
                <img src="{{ asset('storage/catalogos_img/defaultService.jpg') }}" alt="" id="js-img-preview" class="col-md-6">
            </div>
        </div>
    </section>
@endsection
