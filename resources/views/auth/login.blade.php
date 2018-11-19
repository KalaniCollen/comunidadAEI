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
                    <i class="login__icon ion-md-mail"></i>
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
                    <i class="login__icon ion-md-key"></i>
                    {!! Form::password('password', ['class' => 'input']) !!}
                    <span class="input__decoration {{ ($errors->has('email') == 1) ? 'input__decoration--error' : '' }}"></span>
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                <a href="{{ route('password.request') }}" class="login__link link text--right">¿Olvidó su contraseña?</a>
                {!! Form::submit('Iniciar Sesión', ['class' => 'btn']) !!}

                <p class="login__link ">¿Aún no tiene una cuenta? <a href="{{ route('register') }}" class="link link--accent">Registrese</a></p>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
