@extends('layouts.app')
@section('content')
<section class="section">
    <section class="section__header">
        <h1 class="section__title">{{ $evento->nombre_evento }}</h1>
        <a href="{{ route('/') }}" class="btn btn--accent">Registrarse</a>
    </section>

    <div class="row section__content">
        <div class="col-md-5 col-lg-5">
            <p class="h2 col-6">{{ title_case(Date::parse($evento->fecha_inicio)->format('d F Y')) }}</p>
            <p class="h4 col-6">{{ title_case(Date::parse($evento->fecha_inicio)->format('H:i')) }} - {{ title_case(Date::parse($evento->fecha_final)->format('H:i')) }} hrs.</p>

            <p class="col-12 mt-3 mb-3">{{ $evento->descripcion_evento }}</p>

            <div class="col-12 mb-3">
                <p class="h3">Costo Evento</p>
                @isset($evento->costo_asociado)
                    <p><span class="roboto-bold">Asociados:</span> $@money($evento->costo_asociado)</p>
                    <p><span class="roboto-bold">No asociados:</span> $@money($evento->costo_no_asociado)<p>
                    @endisset
            </div>

            <div class="col-12 mb-3">
                <p class="h3">Dirección Evento</p>
                <p><i class="ion-md-pin"></i> {{ $evento->direccion_evento }}</p>
            </div>

            <div class="col-12 mb-3">
                <p class="h3">Ponente</p>
                <p><i class="ion-md-person"></i> {{ $evento->ponente }}</p>
            </div>

            <div class="col-12 mb-3">
                <p class="h3">Organizador</p>
                <p><i class="ion-md-contact"></i> {{ $evento->organizador }}</p>
                <p><i class="ion-md-call"></i> {{ $evento->telefono_organizador }}</p>
                <p><i class="ion-md-mail"></i> {{ $evento->correo_electronico_organizador }}</p>
            </div>
        </div>
        <div class="col-md-7 col-lg-7">
            <img src="{{ $evento->imagen }}" alt="">
        </div>
    </div>
</section>
@endsection
