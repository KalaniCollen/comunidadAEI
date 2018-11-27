@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title">Agregar Producto</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            @include('catalogo.productos.fragments.form')

            {!! Form::submit('Agregar servicio', ['class' => 'btn btn--accent']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-md-6">
            <img src="{{ asset('storage/catalogos_img/defaultService.jpg') }}" alt="" id="js-img-preview" class="col-12">
        </div>
    </div>
</section>
@endsection
