@extends('layouts.head')
@section('content')

<div class="section login registro">
    <div class="login__decoration registro__decoration">
        <div class="login__content">
            <p class="login__text">El valor de una empresa </p>
            <p class="login__author">Juan Hernández</p>
        </div>
    </div>

    <form action="" class="form login__form registro__form">
        <h2 class="fc-white">Registro</h2>
        <h4 class="fc-white">Información Personal</h4>

        <div class="form__input form__input--column">
            <label for="nombres" class="form__input-label fc-white">Nombres</label>
            <input type="text" name="nombres" value="" id="nombres" class="form__input-input">
            <span class="form__error {{ ($errors->has('nombre')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="Apellido_Paterno" class="form__input-label fc-white">Apellido Paterno</label>
            <input type="text" name="Apellido_Paterno" value="" id="Apellido_Paterno" class="form__input-input">
            <span class="form__error {{ ($errors->has('Apellido_Paterno')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="Apellido_Materno" class="form__input-label fc-white">Apellido Materno</label>
            <input type="text" name="Apellido_Materno" value="" id="Apellido_Materno" class="form__input-input">
            <span class="form__error {{ ($errors->has('Apellido_Materno')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="Fecha_Nacimiento" class="form__input-label fc-white">Fecha de nacimiento</label>
            <input type="date" name="Fecha_Nacimiento" value="" id="Fecha_Nacimiento" class="form__input-input">
            <span class="form__error {{ ($errors->has('Fecha_Nacimiento')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__group-radio">
            <p class="link fc-white">Sexo</p>
            <div class="form__radio">
                <input type="radio" name="sexo" id="mujer" class="form__radio-input">
                <label class="form__radio-label fc-white" for="mujer">Mujer</label>
            </div>

            <div class="form__radio">
                <input type="radio" name="sexo" id="hombre" class="form__radio-input">
                <label class="form__radio-label fc-white" for="hombre">Hombre</label>
            </div>
        </div>


        <h4 class="fc-white">Información de Usuario</h4>

        <div class="form__input form__input--column">
            <label for="name" class="form__input-label fc-white">Usuario</label>
            <input type="text" name="name" value="" id="name" class="form__input-input">
            <span class="form__error {{ ($errors->has('name')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__input form__input--column">
            <label for="password" class="form__input-label fc-white">Constraseña</label>
            <input type="password" name="password" value="" id="password" class="form__input-input">
            <span class="form__error {{ ($errors->has('password')) ? 'form__error--show' : '' }}">¡El correo que ingreso no existe!</span>
        </div>

        <div class="form__checkbox">
            <input type="checkbox" name="" value="" id="email-notificaciones" class="form__checkbox-input">
            <label for="email-notificaciones" class="form__checkbox-label fc-white">Recibir notificaciones por e-mail</label>
        </div>

        <input type="submit" value="Registrarse" class="btn">

    </form>
</div>
@endsection
