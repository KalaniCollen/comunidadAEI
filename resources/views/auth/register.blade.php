@extends('layouts.html')
@section('content')
<section class="section login registro">
    <div class="row no-gutters">

        <div class="card card--login">
            {!! Form::open(['route' => ['register'], 'class' => 'login__form']) !!}

            <h2>Datos Personales</h2>
            <div class="group group--login">
                {!! Form::label('name', 'Nombre(s)', ['class' => 'label']) !!}
                <i class="login__icon ion-ios-person"></i>
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

                {!! Form::label('sexo', 'Sexo', ['class' => 'label']) !!}

                {!! Form::radiobtn('sexo', 'H', false, 'Hombre') !!}
                {!! Form::radiobtn('sexo', 'M', false, 'Mujer') !!}
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
                {!! Form::check('notificacion_correo', 'notificacion_correo', 'checked', 'Recibir notificaciones por correo') !!}
            </div>

            {!! Form::submit('Registrarse', ['class' => 'btn']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</section>
@endsection
