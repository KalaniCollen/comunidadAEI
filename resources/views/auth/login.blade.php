{{-- @extends('layouts.html')
@section('styles')
    <style media="screen">
        .container {
            min-height: 100vh;
            display: -webkit-flex;
            display: -ms-flex;
            display: flex;
            flex-direction: column;
            -ms-align-items: center;
            align-items: center;
            justify-content: center;
            background: url('https://images.pexels.com/photos/604661/pexels-photo-604661.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') no-repeat center center / cover;
        }
    </style>
@endsection
@section('content')
    <div class="card card--login js-card">
        <div class="login__header">
            <a class="brand login--brand" href="/">
                <img src="/img/logoAEI-blanco.png" alt="" class="brand__logo">
                <p class="brand__title">Comunidad AEI</p>
            </a>
            <h2 class="login__title text--center">Asociación de Empresarios de Iztapalapa A.C.</h2>
            <h4 class="login__phrase text--white text--center">¡Bienvenido de nuevo!</h4>
        </div>
        {!! Form::open(['route' => ['login'], 'class' => 'login__form']) !!}

            <div class="group">
                {!! Form::label('email', 'Correo', ['class' => 'label']) !!}
                {!! Form::email('email', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                {!! Form::password('password', ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::check('remember', 'remember',true, 'Recordar Cuenta') !!}
            </div>
            <a href="{{ route('password.request') }}" class="link">¿Olvidó su contraseña?</a>

            <button type="submit" class="btn btn--accent"><i class="btn__icon ion-ios-send"></i>Iniciar Sesión</button>

            <a href="{{ route('register') }}" class="link">Aún no tiene una cuenta? Registrese</a>
        {!! Form::close() !!}
    </div>
@endsection --}}
@extends('layouts.html')
@section('content')
    <section class="section login">
        <div class="card card--login">

            <div class="login__header">
                <h1 class="h2 text--center">Iniciar Sesión</h1>
                <img src="{{ asset('img/logoAEI-azul.png') }}" alt="" class="login__logo">
                <h2 class="h4 text--center">Asociación de Empresarios de Iztapalapa A.C.</h2>
            </div>

            {!! Form::open(['class' => 'login__form']) !!}
                <div class="group group--login">
                    {!! Form::label('email', 'Correo eléctronico', ['class' => 'label']) !!}
                    <i class="login__icon ion-ios-at"></i>
                    {!! Form::email('email', null, ['class' => 'input']) !!}
                    <span class="input__decoration {{ ($errors->has('email') == 1) ? 'input__decoration--error' : '' }}"></span>
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="group group--login">
                    {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                    <i class="login__icon ion-ios-key"></i>
                    {!! Form::password('password', ['class' => 'input']) !!}
                    <span class="input__decoration {{ ($errors->has('email') == 1) ? 'input__decoration--error' : '' }}"></span>
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                <a href="#" class="login__link link text--right">¿Olvidó su contraseña?</a>
                {!! Form::submit('Iniciar Sesión', ['class' => 'btn']) !!}

                <p class="login__link ">¿Aún no tiene una cuenta? <a href="#" class="link link--accent">Registrese</a></p>
            {!! Form::close() !!}


        </div>
    </section>
@endsection
