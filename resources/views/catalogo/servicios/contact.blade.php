@extends('layouts.app')
@section('content')
    <section class="section">
        <h2>Orden de Servicio</h2>
        <p class="h5"><b>Servicio a realizar: </b> {{ $servicio->nombre }}</p>
        <p class="h5"><b>Horario de atención: </b> {{ Date::parse($servicio->horario_inicio)->format('H:m') }} - {{ Date::parse($servicio->horario_cierre)->format('H:m') }} hrs.</p>

        {!! Form::open(['route' => ['servicio.orden-servicio']]) !!}

        {!! Form::inText('nombreRemitente', null, 'Nombre Completo') !!}
        {!! Form::inEmail('correo', null, 'Correo eléctronico') !!}
        {!! Form::inTextArea('mensaje', null, 'Mensaje') !!}

        <button class="btn btn--accent">
            <i class="ion-md-send btn__icon"></i> Enviar
        </button>

        {!! Form::close() !!}
    </section>
@endsection
