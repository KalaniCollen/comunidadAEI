@extends('layouts.head')
@section('content')

<div class="section login registro">
    <div class="login__decoration registro__decoration">
        <div class="login__content">
            <p class="login__text">La mejor publicidad es la que hacen los clientes satisfechos</p>
            <p class="login__author">AEI</p>
        </div>
    </div>

    <form  method="POST" action="{{ route('register') }}" class="form login__form registro__form">
        {{ csrf_field() }}
        <h2 class="fc-white">Registro</h2>
        <h4 class="fc-white">Información Personal</h4>

        <div class="form__input form__input--column">
            <label for="nombres" class="form__input-label fc-white">Nombres</label>
            <input type="text" name="name" value="" id="nombres" class="form__input-input">
            <span class="form__error {{ ($errors->has('nombre')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="apellido_paterno" class="form__input-label fc-white">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" value="" id="apellido_paterno" class="form__input-input">
            <span class="form__error {{ ($errors->has('apellido_paterno')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="apellido_materno" class="form__input-label fc-white">Apellido Materno</label>
            <input type="text" name="apellido_materno" value="" id="apellido_materno" class="form__input-input">
            <span class="form__error {{ ($errors->has('apellido_materno')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="fecha_nacimiento" class="form__input-label fc-white">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="" id="fecha_nacimiento" class="form__input-input" value="{{date('Y-m-d', strtotime('-40 year'))}}" min="{{date('Y-m-d', strtotime('-90 year'))}}" max="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form__group-radio">
            <p class="link fc-white">Sexo</p>
            <div class="form__radio">
                <input type="radio" name="sexo" id="mujer" class="form__radio-input" value="M">
                <label class="form__radio-label fc-white" for="mujer">Mujer</label>
            </div>

            <div class="form__radio">
                <input type="radio" name="sexo" id="hombre" class="form__radio-input" value="H">
                <label class="form__radio-label fc-white" for="hombre">Hombre</label>
            </div>
        </div>


        <h4 class="fc-white">Información de Usuario</h4>

        <div class="form__input form__input--column">
            <label for="correo" class="form__input-label fc-white">Correo</label>
            <input type="email" name="email" value="{{ old('email') }}" id="correo" class="form__input-input">
            <span class="form__error {{ ($errors->has('correo')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="password" class="form__input-label fc-white">Constraseña</label>
            <input type="password" name="password" value="" id="password" class="form__input-input">
            <span class="form__error {{ ($errors->has('password')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="password_confirmation" class="form__input-label fc-white">Confirmar Constraseña</label>
            <input type="password" name="password_confirmation" value="" id="password_confirmation" class="form__input-input">
            <span class="form__error {{ ($errors->has('password_confirmation')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>


        <div class="form__checkbox">
            <input type="checkbox" name="Notificacion" value="" id="email-notificaciones" class="form__checkbox-input" checked>
            <label for="email-notificaciones" class="form__checkbox-label fc-white">Recibir notificaciones por e-mail</label>
        </div>

        <input type="submit" value="Registrarse" class="btn">

    </form>
</div>
@endsection
