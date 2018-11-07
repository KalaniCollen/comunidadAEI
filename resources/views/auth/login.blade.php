@extends('layouts.head')

@section('content')
    <section class="section login">

    <div class="login__decoration">
        <div class="login__content">
            <p class="login__text">No te sientes a esperar que lleguen las oportunidades ¡Levantate y haz que pasen!</p>
            <p class="login__author">MADAM CJ WALKER</p>
        </div>
    </div>
    <div class="login__form">
        <img src="/img/logoAEI-blanco.png" alt="" class="login__img">
        <p class="login__title">¡Bienvenido de nuevo a la Comunidad Digital AEI!</p>
        <form class="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form__input{{ $errors->has('email') ? ' form--error' : '' }} form__input--column">
                <label for="email" class="fc-white">E-Mail Address</label>
                <input id="email" type="email" class="form__input-input" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="form__error-show">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form__input{{ $errors->has('password') ? ' form--error' : '' }} form__input--column">
                <label for="password" class="fc-white">Password</label>
                <input id="password" type="password" class="form__input-input" name="password" required>

                @if ($errors->has('password'))
                    <span class="form__error--show">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form__checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="check" class="form__checkbox-input">
                <label for="check" class="form__checkbox-label fc-white">Recordar Cuenta</label>
            </div>

            <a class="login__link" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
        <p class="login__link">Aún no tiene una cuenta? <a href="{{ route('register') }}" class="link--accent">Registrese</a></p>
    </div>
</section>
@endsection
