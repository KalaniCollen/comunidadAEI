@extends('layouts.html')
@section('content')
<section class="section login registro">
    <div class="row no-gutters">

        <div class="card card--login">
            {!! Form::open(['route' => ['register'], 'class' => 'login__form']) !!}
            <div class="login__header">
                <h1 class="h2 text--center">Registro</h1>
                <img src="{{ asset('img/logoAEI-azul.png') }}" alt="" class="login__logo">
                <h2 class="h4 text--center">Asociación de Empresarios de Iztapalapa A.C.</h2>
            </div>

            <h2>Datos Personales</h2>
            {!! Form::inText('name', null, 'Nombre(s)') !!}
            {!! Form::inText('apellido_paterno', null, 'Apellido Paterno') !!}
            {!! Form::inText('apellido_materno', null, 'Apellido Materno') !!}

            <div class="group">
                <p class="label w-100">Sexo</p>
                {!! Form::inRadio('sexo', 'H', 'Hombre') !!}
                {!! Form::inRadio('sexo', 'M', 'Mujer') !!}
            </div>

            <div class="group">
                {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento', ['class' => 'label']) !!}
                {!! Form::date('fecha_nacimiento', null, ['class' => 'input']) !!}
            </div>

            <h2>Datos de usuario</h2>

            {!! Form::inEmail('email', null, 'Correo eléctronico') !!}

            <div class="group">
                {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                {!! Form::password('password', ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('password_confirmation', 'Confirmar contraseña', ['class' => 'label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'input']) !!}
            </div>

            {!! Form::inCheck('notificacion_correo', null, 'Recibir notificaciones por correo') !!}

            <button class="btn btn--accent">
                <i class="btn__icon ion-md-send"></i> Registrarse
            </button>



            {{-- <div class="group group--login">
                {!! Form::label('name', 'Nombre(s)', ['class' => 'label']) !!}
                {!! Form::text('name', null, ['class' => 'input']) !!}
                <span class="input__decoration {{ ($errors->has('name') == 1) ? 'input__decoration--error' : '' }}"></span>
            </div>

            <div class="group">
                {!! Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'label']) !!}
                {!! Form::text('apellido_paterno', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('apellido_materno', 'Apellido Materno', ['class' => 'label']) !!}
                {!! Form::text('apellido_materno', null, ['class' => 'input']) !!}
            </div>


            <div class="group">
                <p class="label w-100">Sexo</p>
                {!! Form::inRadio('sexo', 'H', 'Hombre') !!}
                {!! Form::inRadio('sexo', 'M', 'Mujer') !!}
            </div>

            <div class="group">
                {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento', ['class' => 'label']) !!}
                {!! Form::date('fecha_nacimiento', null, ['class' => 'input']) !!}
            </div>

            <h2>Datos de usuario</h2>

            <div class="group">
                {!! Form::label('email', 'Correo', ['class' => 'label']) !!}
                {!! Form::email('email', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                {!! Form::password('password', ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('password_confirmation', 'Confirmar contraseña', ['class' => 'label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::inCheck('notificacion_correo', null, 'Recibir notificaciones por correo') !!}
            </div>

            {!! Form::submit('Registrarse', ['class' => 'btn']) !!} --}}
        </div>

        {!! Form::close() !!}
    </div>
</section>
@endsection
