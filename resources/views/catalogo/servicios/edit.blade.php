@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title">Actualizar Servicio</h1>
    </div>
    <div class="section__body">
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-5">
                {!! Form::model($servicio, ['route' => ['servicios.update', $servicio->slug], 'method' => 'PUT', 'files' => true, 'class' => 'form']) !!}
                <div class="form__body">
                    @include('catalogo.servicios.fragments.form')
                    {!! Form::submit('Actualizar Servicio', ['class' => 'btn btn--accent']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6 col-lg-7">
                <img class="med-mp" src="{{ asset("storage/catalogos_img/$servicio->imagen") }}" alt="" id="js-img-preview">
            </div>
        </div>
    </div>
</section>
@endsection
