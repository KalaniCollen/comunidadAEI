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
                    {!! Form::inRadio('sexo', 'H', false ,'Hombre') !!}
                    {!! Form::inRadio('sexo', 'M', false ,'Mujer') !!}
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
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                <div class="group">
                    {!! Form::label('password_confirmation', 'Confirmar contraseña', ['class' => 'label']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'input']) !!}
                    @if ($errors->has('password_confirmation'))
                        @foreach ($errors->get('password_confirmation') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                {!! Form::inCheck('notificacion_correo', null, true,'Recibir notificaciones por correo') !!}

                <button class="btn btn--accent">
                    <i class="btn__icon ion-md-send"></i> Registrarse
                </button>

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
