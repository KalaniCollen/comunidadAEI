@extends('layouts.app')
@section('content')

    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Editar Perfil</h1>
        </div>

        <div class="row card--profile no-gutters">
            <div class="col-md-12 col-lg-12 profile__info d-flex flex-column">
                <img src="{{ $perfil_usuario->imagen }}" alt="Imagen de perfil del usuario {{ $perfil_usuario->usuario->name }}" class="profile__image" width="180px" style="border-radius: 50%; margin-bottom: 16px;" id="js-image-profile">

                <h2 class="mb-2">{{ $perfil_usuario->usuario->name }} {{ $perfil_usuario->usuario->apellido_paterno }} {{ $perfil_usuario->usuario->apellido_materno }}</h2>

                <button class="btn" data-toggle="modal" data-target="#modal-picture">
                    <i class="btn__icon ion-md-camera"></i>
                    Cambiar foto de perfil
                </button>
            </div>
        </div>

        <div class="section__body mt-5">
            <div class="row no-gutters profile__configuration">
                <div class="col-sm-12 col-md-3 col-lg-2 mr-md-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active link--undecorate" id="v-pills-datos-personales-tab" data-toggle="pill" href="#v-pills-datos-personales" role="tab" aria-controls="v-pills-datos-personales" aria-selected="true">Datos Personales</a>
                        <a class="nav-link link--undecorate" id="v-pills-datos-cuenta-tab" data-toggle="pill" href="#v-pills-datos-cuenta" role="tab" aria-controls="v-pills-datos-cuenta" aria-selected="false">Datos de la cuenta</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-3 form pb-3 pt-3 pr-2 pl-2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-datos-personales" role="tabpanel" aria-labelledby="v-pills-datos-personales-tab">

                            <p class="montserrat-light mb-3 h2 col-12">Datos Personales</p>

                            {!! Form::open(['route' => ['perfil-usuario.update', $perfil_usuario->slug_usuario], 'method' => 'PUT', 'class' => 'row no-gutters']) !!}
                            <div class="col-12">
                                {!! Form::inText('name', $perfil_usuario->usuario->name, 'Nombre') !!}
                            </div>

                            <div class="col-12">
                                {!! Form::inText('apellido_paterno', $perfil_usuario->usuario->apellido_paterno, 'Apellido Paterno') !!}
                            </div>

                            <div class="col-12">
                                {!! Form::inText('apellido_materno', $perfil_usuario->usuario->apellido_materno, 'Apellido Materno') !!}
                            </div>

                            <div class="group col-12">
                                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento', ['class' => 'label']) !!}
                                {!! Form::date('fecha_nacimiento', Date::parse($perfil_usuario->fecha_nacimiento)->format('Y-m-d'), ['class' => 'input']) !!}
                            </div>

                            <div class="group col-12">
                                <p class="label w-100">Sexo</p>
                                {!! Form::inRadio('sexo', 'H', strcmp($perfil_usuario->sexo, 'H') == 0 ? true : false, 'Hombre') !!}
                                {!! Form::inRadio('sexo', 'M', strcmp($perfil_usuario->sexo, 'M') == 0 ? true : false ,'Mujer') !!}
                            </div>

                            <div class="col-12">
                                {!! Form::inTel('telefono_movil', $perfil_usuario->telefono_movil, 'Teléfono móvil') !!}

                            </div>
                            <div class="col-12">
                                {!! Form::inText('red_social', $perfil_usuario->red_social, 'Red Social', '', ['placeholder' => 'https://www.facebook.com/user']) !!}

                            </div>
                            <div class="group col-12">
                                <label for="privacidad" class="label w-100">Estado del perfil: </label>
                                {!! Form::inSwitch('privacidad', 0, $perfil_usuario->privacidad, ($perfil_usuario->privacidad === 0) ? 'privado' : 'publico') !!}
                            </div>

                            <button type="submit" class="btn btn--accent">
                                <i class="btn__icon ion-md-send"></i> Actualizar Perfil
                            </button>
                            {!! Form::close() !!}
                        </div>

                        <div class="tab-pane fade" id="v-pills-datos-cuenta" role="tabpanel" aria-labelledby="v-pills-datos-cuenta-tab">

                            <p class="montserrat-light mb-3 h2 col-12">Datos de la cuenta</p>

                            {!! Form::open(['route' => ['perfil-usuario.update-account', $perfil_usuario->usuario->id_usuario], 'method' => 'PUT']) !!}

                            {!! Form::inEmail('email', $perfil_usuario->usuario->email, 'Correo eléctronico') !!}

                            <div class="group">
                                {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                                {!! Form::password('password', ['class' => 'input']) !!}
                            </div>

                            {!! Form::inCheck('notificacion_correo', null,  $perfil_usuario->usuario->notificacion_correo, 'Notificaciones por correo') !!}

                            <button type="button" class="btn btn--accent mt-2 mb-2">
                                <i class="btn__icon ion-md-send"></i> Actualizar cuenta
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @component('components.modal', [
        'id' => 'modal-picture',
        'title' => 'Actualizar foto de perfil',
        'imagen' => $perfil_usuario->imagen,
        'url' => 'perfil-usuario.save-image',
        'perfil' => $perfil_usuario->slug_usuario,
        'label' => 'Subir foto de perfil'
    ])
    @endcomponent
@endsection
