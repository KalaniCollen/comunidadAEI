@extends('layouts.head')
@section('content')
<section class="section profile">
@include('perfiles.template-index', [
    'titleSection' => 'Perfil empresa',
    'route' => 'perfil-empresa.edit',
    'object' => $perfilE->slug_empresa,
    'profileImage' => $perfilE->logo_empresa,
    'profileName' => $perfilE->nombre_empresa,
    'profileSubtitleIcon' => 'pin',
    'profileSubtitle' => $perfilE->direccion_empresa,
    'information' => [
        ['title' => 'Tipo empresa', 'icon' => 'business', 'text' => $perfilE->tipo_empresa],
        ['title' => 'Giro empresa', 'icon' => 'briefcase', 'text' => $perfilE->giro_empresa],
        ['title' => 'Teléfono empresa', 'icon' => 'call', 'text' => $perfilE->telefono_fijo_empresa],
        ['title' => 'Correo empresa', 'icon' => 'mail', 'text' => $perfilE->correo_electronico_empresa],
        ['title' => 'Horario de atención', 'icon' => 'time', 'text' => $perfilE->horario_atencion],
        ['title' => 'Página web', 'icon' => 'globe', 'text' => '', 'link' => $perfilE->pag_web_empresa],
    ]
])

    <div class="row">
        @isset($perfilE->red_social_twitter_empresa)
            <div class="col-md-4 profile__data">
                <a href="{{ $perfilE->red_social_twitter_empresa }}" target="_blank"><i class="ion-logo-twitter"></i> Twitter</a>
            </div>
        @endisset
        @isset($perfilE->red_social_facebook_empresa)
            <div class="col-md-4 profile__data">
                <a href="{{ $perfilE->red_social_facebook_empresa }}" target="_blank"><i class="ion-logo-facebook"></i> Facebook</a>
            </div>
        @endisset
        @isset($perfilE->red_social_instagram)
            <div class="col-md-4 profile__data">
                <a href="{{ $perfilE->red_social_instagram }}" target="_blank"><i class="ion-logo-facebook"></i> Instagram</a>
            </div>
        @endisset
    </div>
</section>
@endsection
