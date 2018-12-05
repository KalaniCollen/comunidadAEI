@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title">Actualizar Producto</h1>
    </div>

    <div class="section__body">
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-5">
                {!! Form::model($producto, ['route' => ['productos.update', $producto->slug], 'method' => 'PUT', 'files' => true, 'class' => 'form']) !!}
                <div class="form__body">
                    @include('catalogo.productos.fragments.form')
                    {!! Form::submit('Actualizar producto', ['class' => 'btn btn--accent']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6 col-lg-7">
                <img class="med-mp" src="{{ asset("storage/catalogos_img/$producto->imagen") }}" alt="" id="js-img-preview">
            </div>
        </div>
    </div>
</section>
@endsection
