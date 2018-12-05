@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Orden de Servicio</h1>
        </div>

        <div class="section__body row no-gutters">
            {!! Form::open(['route' => ['servicio.orden-servicio'], 'class' => 'form col-lg-4 pt-3 pb-3 pl-2 pr-2 mb-4 d-flex flex-column align-items-center']) !!}
            <p class="h2">{{ $servicio->nombre }}</p>
            <p class="h4 mb-3"><b>Horario de atención: </b> {{ Date::parse($servicio->horario_inicio)->format('H:m') }} - {{ Date::parse($servicio->horario_cierre)->format('H:m') }} hrs.</p>
            {!! Form::hidden('servicio', $servicio->nombre) !!}
            {!! Form::hidden('destinatario', $servicio->empresa->nombre_empresa) !!}
            {!! Form::hidden('destinatarioCorreo', $servicio->empresa->correo_electronico_empresa) !!}

            {!! Form::inText('nombreRemitente', null, 'Nombre Completo') !!}
            {!! Form::inEmail('remitente', null, 'Correo eléctronico') !!}
            {!! Form::inTextArea('mensaje', null, 'Mensaje') !!}

            <button class="btn btn--accent">
                <i class="ion-md-send btn__icon"></i> Enviar
            </button>

            {!! Form::close() !!}

            <div class="col-lg-8">
                <div class="col-12">
                    <a href="{{ route('perfil-empresa.show', $servicio->empresa->slug_empresa) }}" class="card__owner">
                        <img src="{{ $servicio->empresa->logo_empresa }}" alt="" class="card__owner-picture">
                        <p class="card__owner-name">{{ $servicio->empresa->nombre_empresa }}</p>
                    </a>
                </div>
                <div class="col-md-12 col-lg-10">
                    <img src="/storage/catalogos_img/{{ $servicio->imagen }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
