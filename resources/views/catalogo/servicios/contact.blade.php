@extends('layouts.head')
@section('content')
    <section class="section">
        <h2>Orden de Servicio</h2>
        <p class="h5"><b>Servicio a realizar: </b> {{ $servicio->nombre }}</p>
        <p class="h5"><b>Horario de atención: </b> {{ $servicio->horario_inicio }} - {{ $servicio->horario_cierre }}</p>
        <br>
        <form action="{{ route('servicio.orden-servicio') }}" method="post" class="form">
            {{ csrf_field('POST') }}

            <input type="hidden" name="destinatario" value="{{ $servicio->empresa->nombre_empresa }}">
            <input type="hidden" name="destinatarioCorreo" value="{{ $servicio->empresa->correo_electronico_empresa }}">
            <input type="hidden" name="servicio" value="{{ $servicio->nombre}}">

            <div class="form__input form__input--column">
                <label for="">Nombre Completo</label>
                @if (Auth::check())
                    <input class="form__input-input" type="text" name="nombreRemitente" id="nombreRemitente" value="{{ Auth::user()->name }}" autocomplete>
                @else
                    <input class="form__input-input" type="text" name="nombreRemitente" id="nombreRemitente" autocomplete>
                @endif
            </div>

            <div class="form__input form__input--column">
                <label for="remitente">Correo</label>
                @if (Auth::check())
                    <input class="form__input-input" type="email" name="remitente" id="remitente" value="{{ Auth::user()->email }}" autocomplete="email">
                @else
                    <input class="form__input-input" type="email" name="remitente" id="remitente" autocomplete="email">
                @endif
            </div>
            <div class="form__input form__input--column">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form__text-input" name="mensaje"></textarea>
            </div>

            <input class="btn btn--accent" type="submit" value="Enviar">
        </form>
    </section>
@endsection
