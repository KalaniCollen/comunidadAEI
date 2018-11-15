@extends('layouts.head')
@section('content')

<div class="section login registro">
    <div class="login__decoration registro__decoration">
        <div class="login__content">
            <p class="login__text">La mejor publicidad es la que hacen los clientes satisfechos</p>
            <p class="login__author">AEI</p>
        </div>
    </div>


    {!! Form::open(['route' => ['register']]) !!}

    <h2>Datos Personales</h2>
    <div class="group">
        {!! Form::label('name', 'Nombre(s)', ['class' => 'label']) !!}
        {!! Form::text('name', null, ['class' => 'input']) !!}
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

    {!! Form::close() !!}
</div>
@endsection
