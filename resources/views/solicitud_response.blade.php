@extends('layouts.app')
@section('styles')
    <style media="screen">
        .section--welcome {
            height: 100vh;
            background: url('/img/response-bg.jpeg') no-repeat center / cover;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
@endsection
@section('content')
<section class="section section--welcome">
    <div class="section__header">
        <h1 class="section__title">¡Bienvenido @if(!empty($user)){{$user->names}}@endif!</h1>
    </div>
    <div class="section__body">
        @if(!empty($mensaje))
            {{$mensaje}}
        @else
            <p class="h2">¡Tus datos han sido enviados a la asociación!</p>
            <p class="h2">Se te enviara un correo de confirmacion cuando la asociación valide tus datos </p>
            <p class="h2"> </p>
        @endif
    </div>
</section>
@endsection
