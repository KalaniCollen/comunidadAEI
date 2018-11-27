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
        <h1 class="section__title">¡Bienvenido a nuestra COMUNIDAD AEI!</h1>
    </div>
    <div class="section__body">
        @if(!empty($mensaje))
            {{$mensaje}}
        @else
            <p class="h2">¡Por favor antes de continuar verifique su correo!</p>
        @endif
    </div>
</section>
@endsection
