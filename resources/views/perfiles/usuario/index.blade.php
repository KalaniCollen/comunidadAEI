@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <div class=" row card--profile no-gutters">
            <div class="col-md-10 col-lg-10 profile__info">
                <img src="{{ $perfil->imagen }}" alt="" class="profile__image" width="180px">

                <div class="profile__info-user">
                    <p class="profile__name">{{ auth()->user()->name }} {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }}</p>
                    <p><i class="ion-md-mail"></i> {{ auth()->user()->email }}</p>
                    <p><i class="ion-md-{{ (strcmp($perfil->sexo, 'H') == 0) ? 'male' : 'female' }}"></i> {{ (strcmp($perfil->sexo, 'H') == 0) ? 'HOMBRE' : 'MUJER' }}</p>
                </div>
            </div>

            @if (Auth::check())
                <div class="col-md-2 col-lg-2 d-flex align-items-center justify-content-center">
                    <a href="{{ route('perfil-usuario.edit', $perfil->slug_usuario) }}" class="btn btn--accent">
                        <i class="btn__icon ion-md-create"></i>Editar Perfil
                    </a>
                </div>
            @endif

        </div>
    </div>
    <div class="section__body">
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-4 profile__data">
                <h2>Fecha de nacimiento</h2>
                <p class="h4"><i class="ion-md-calendar"></i> {{ Date::parse($perfil->fecha_nacimiento)->format('d F Y') }}</p>
            </div>
            <div class="col-md-6 col-lg-4 profile__data">
                @isset($perfil->telefono_movil)
                    <h2>Teléfono Móvil</h2>
                    <p class="h4"><i class="ion-md-call"></i> {{ $perfil->telefono_movil }}</p>
                @endisset
            </div>
            <div class="col-md-6 col-lg-4 profile__data">
                @isset($perfil->red_social)
                    <h2>Redes Sociales</h2>
                    <a href="{{ $perfil->red_social }}" target="_blank"><i class="ion-logo-facebook"></i> Facebook</a>
                @endisset
            </div>
        </div>
    </div>
</section>
@endsection
