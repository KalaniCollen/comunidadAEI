@extends('layouts.head')
@section('content')
<section class="section profile">
    <header class="profile__header">
        <img src="{{ $perfilE->logo_empresa }}" alt="" class="profile__picture">
        <h1 class="profile__name">{{ $perfilE->nombre_empresa }}</h1>
        <h2 class="profile__pin"><i class="ion-md-pin"></i> {{ $perfilE->direccion_empresa }}</h2>
    </header>
    <div class="profile__information">
        @isset($perfilE->tipo_empresa)
            <h3>Tipo de empresa</h3>
            <p class="h5"><i class="ion-ios-business"></i> {{ $perfilE->tipo_empresa }}</p>
        @endisset
        @isset($perfilE->giro_empresa)
            <h3>Giro de la empresa</h3>
            <p class="h5"><i class="ion-ios-briefcase"></i> {{ $perfilE->giro_empresa }}</p>
        @endisset
        @isset($perfilE->telefono_fijo_empresa)
            <h3>Teléfono</h3>
            <p class="h5"><i class="ion-ios-call"></i> {{ $perfilE->telefono_fijo_empresa }}</p>
        @endisset
        @isset($perfilE->correo_electronico_empresa)
            <h3>Correo</h3>
            <p class="h5"><i class="ion-ios-mail"></i> {{ $perfilE->correo_electronico_empresa }}</p>
        @endisset
        @isset($perfilE->horario_atencion)
            <h3>Horario de atención</h3>
            <p class="h5"><i class="ion-ios-time"></i> {{ $perfilE->horario_atencion }}</p>
        @endisset
        @isset($perfilE->pag_web_empresa)
            <h3>Página web</h3>
            <a href="{{ $perfilE->pag_web_empresa }}" target="_blank" class="h5"><i class="ion-ios-globe"></i> {{ $perfilE->pag_web_empresa }}</a>
        @endisset
        @isset($perfilE->red_social_facebook_empresa)
            <a href="{{ $perfilE->red_social_facebook_empresa }}" target="_blank" class="h5"><i class="ion-logo-facebook"></i> Facebook</a>
        @endisset
        @isset($perfilE->red_social_twitter_empresa)
            <a href="{{ $perfilE->red_social_twitter_empresa }}" target="_blank" class="h5"><i class="ion-logo-twitter"></i> Twitter</a>
        @endisset
        @isset($perfilE->red_social_instagram)
            <a href="{{ $perfilE->red_social_instagram }}" target="_blank" class="h5"><i class="ion-logo-instagram"></i> Instagram</a>
        @endisset
    </div>
    @if (Auth::check())
        <div class="profile__edit">
            <a href="{{ route('perfil-empresa.edit', $perfilE->slug_empresa) }}" class="btn btn--accent">Editar perfil</a>
        </div>
    @endif
</section>
@endsection
