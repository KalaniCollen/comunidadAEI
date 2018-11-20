@extends('layouts.head')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset ('css/privacity.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}"/>
@endsection

@section('content')
<section class="section">
    @include('perfiles.template-index', [
        'titleSection' => 'Perfil usuario',
        'route' => 'perfil-usuario.edit',
        'object' => $perfil->slug_usuario,
        'profileImage' => $perfil->imagen,
        'profileName' => Auth::user()->name . ' ' . Auth::user()->apellido_paterno . ' ' . Auth::user()->apellido_materno,
        'profileSubtitleIcon' => 'calendar',
        'profileSubtitle' => \Carbon\Carbon::parse($perfil->fecha_nacimiento)->format('d M Y'),
        'information' => [
            ['title' => 'Sexo', 'icon' => (strcmp($perfil->sexo, "H") == 0) ? 'male' : 'female', 'text' => (strcmp($perfil->sexo, "H") == 0) ? 'Hombre' : 'Mujer'],
            ['title' => 'Teléfono móvil', 'icon' => 'phone-portrait', 'text' => $perfil->telefono_movil],
            ['title' => 'Correo eléctronico', 'icon' => 'mail', 'text' => Auth::user()->email],
        ]
    ])
    @isset($perfil->red_social)
        <div class="col-sm-12 col-md-6 col-lg-4 profile__data">
            <a class="h5" href="{{ $perfil->red_social }}" target="_blank"><i class="ion-logo-facebook"></i> Facebook</a>
        </div>
    @endisset
</section>

@endsection
@section('scripts')
<script src="{{ asset('js/Perfil.js')}}" type="text/javascript"></script>
@endsection
