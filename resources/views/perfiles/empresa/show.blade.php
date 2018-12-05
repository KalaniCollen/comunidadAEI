@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/botonessociales.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjetadesplegar.css')}}" />
@endsection

@section('content')
<section class="section profile profile--section">
    @include('Modal.tarjeta')

    <div class="profile__cover" style="background-image: url('/img/login-goal.jpg');"></div>

    <div class="profile__information">
        <div class="profile__profile d-flex flex-column">
            <img src="{{ $perfilEmpresa->logo_empresa }}" alt="" class="profile__picture">
            <h1 class="profile__username">{{ $perfilEmpresa->nombre_empresa }}</h1>

            <button id="Tarjeta" class="btn btn--ghost">Contacto Directo</button>
            @isset($perfilEmpresa->pag_web_empresa)
                <a href="{{ $perfilEmpresa->pag_web_empresa }}" target="_blank" class="text--accent"><i class="ion-md-globe"></i> {{ $perfilEmpresa->pag_web_empresa }}</a>
            @endisset
            @isset($perfilEmpresa->direccion_empresa)
                <p><i class="ion-md-pin"></i> {{ $perfilEmpresa->direccion_empresa }}</p>
            @endisset
        </div>
        <div class="profile__content row no-gutters">
            @php
                $infoEmpresa = [
                    [ 'data' => $perfilEmpresa->tipo_empresa, 'size' => 'col-md-6 col-lg-4', 'title' => 'Tipo de empresa', 'icon' => 'ion-md-business' ],
                    [ 'data' => $perfilEmpresa->giro_empresa, 'size' => 'col-md-6 col-lg-4', 'title' => 'Giro de la empresa', 'icon' => 'ion-md-briefcase' ],
                    [ 'data' => $perfilEmpresa->horario_inicio, 'size' => 'col-md-6 col-lg-4', 'title' => 'Horario de atención', 'icon' => 'ion-md-time' ],
                    [ 'data' => $perfilEmpresa->correo_electronico_empresa, 'size' => 'col-md-6 col-lg-4', 'title' => 'Correo eléctronico', 'icon' => 'ion-md-email' ],
                    [ 'data' => $perfilEmpresa->telefono_fijo_empresa, 'size' => 'col-md-6 col-lg-4', 'title' => 'Teléfono de la empresa', 'icon' => 'ion-md-call' ],
                ];
            @endphp
            @each('perfiles.item-data', $infoEmpresa, 'obj')
            @isset($perfilEmpresa->descripcion)
                <div class="col-12">
                    <div class="row no-gutters">
                        <h2 class="h1">Descripción de la empresa</h2>
                        <p>{{ $perfilEmpresa->descripcion }}</p>
                    </div>
                </div>
            @endisset
        </div>
        <div class="row no-gutters profile__footer">
            @isset($perfilEmpresa->red_social_facebook_empresa)
                <div class="col-md-4 col-lg-4 profile__data">
                    <a href="{{ $perfilEmpresa->red_social_facebook_empresa }}" target="_blank" class="link--undecorate red--social"><i class="ion-logo-facebook"></i> Facebook</a>
                </div>
            @endisset

            @isset($perfilEmpresa->red_social_twitter_empresa)
                <div class="col-md-4 col-lg-4 profile__data">
                    <a href="{{ $perfilEmpresa->red_social_twitter_empresa }}" target="_blank" class="link--undecorate red--social"><i class="ion-logo-twitter"></i> Twitter</a>
                </div>
            @endisset

            @isset($perfilEmpresa->red_social_instagram)
                <div class="col-md-4 col-lg-4 profile__data">
                    <a href="{{ $perfilEmpresa->red_social_instagram }}" target="_blank" class="link--undecorate red--social"><i class="ion-logo-instagram"></i> Instagram</a>
                </div>
            @endisset
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('js/PerfilEm.js')}}" harset="utf-8"></script>
@endsection
