@extends('layouts.app')
@section('content')
<section class="section profile profile--section">

    <div class="profile__cover" style="background-image: url('/img/login-goal.jpg');">
        <button class="btn btn--accent profile__cover-btn">
            <i class="btn__icon ion-md-create"></i> Cambiar foto de portada
        </button>
    </div>

    <div class="profile__information">
        <div class="profile__profile d-flex flex-column align-items-center">
            <img src="{{ $perfilEmpresa->logo_empresa }}" alt="" class="profile__picture">
            <h1 class="profile__username">{{ $perfilEmpresa->nombre_empresa }}</h1>
            @isset($perfilEmpresa->pag_web_empresa)
                <a href="{{ $perfilEmpresa->pag_web_empresa }}" target="_blank" class="text--accent"><i class="ion-md-globe"></i> {{ $perfilEmpresa->pag_web_empresa }}</a>
            @endisset
            @isset($perfilEmpresa->direccion_empresa)
                <p><i class="ion-md-pin"></i> {{ $perfilEmpresa->direccion_empresa }}</p>
            @endisset
            @if (auth()->user()->id_usuario == $perfilEmpresa->id_usuario )
                <a href="{{ route('perfil-empresa.edit', $perfilEmpresa->slug_empresa) }}" class="btn btn--profile mb-2 mt-2" data-toggle="modal" data-target="#modal-logo"><i class="btn__icon ion-md-camera"></i> Actualizar Logotipo</a>
            @endif
        </div>

        <div class="profile__content d-flex justify-content-center">
            {!! Form::model($perfilEmpresa, ['route' => ['perfil-empresa.update', $perfilEmpresa->slug_empresa], 'class' => 'row', 'method' => 'PUT', 'class' => 'row no-gutters w-50 d-flex align-items-center justify-content-center']) !!}

                {!! Form::inText('nombre_empresa', null, 'Nombre de la empresa', 'col-12 pr-2 pl-2') !!}

                {!! Form::inSelect('tipo_empresa', null, 'Tipo de empresa', ['PUBLICA' => 'PUBLICA', 'PRIVADA' => 'PRIVADA', 'MIXTA' => 'MIXTA'], 'col-6 pr-2 pl-2') !!}

                {!! Form::inSelect('giro_empresa', null, 'Giro de la empresa', ['Minería' => 'Minería', 'Pesca' => 'Pesca', 'Bienes Raíces' => 'Bienes Raíces', 'Construcción' => 'Construcción', 'Ganadería' => 'Ganadería', 'Transporte' => 'Transporte', 'Software' => 'Software'], 'col-6 pr-2 pl-2' ) !!}

                <div class="group col-6 pr-2 pl-2">
                    <p class="w-100">¿Que ofrece su empresa?</p>
                    {!! Form::inCheck('servicio_empresa', 0, null, 'Servicios') !!}
                    {!! Form::inCheck('producto_empresa', 0, null, 'Productos') !!}
                </div>

                {!! Form::inTel('telefono_fijo_empresa', null, 'Teléfono fijo', 'col-6 pr-2 pl-2') !!}

                <div class="group col-6 pr-2 pl-2">
                    {!! Form::label('horario_inicio', 'Horario de atención de', ['class' => 'label']) !!}
                    {!! Form::time('horario_inicio', null, ['class' => 'input']) !!}
                </div>

                <div class="group col-6 pr-2 pl-2">
                    {!! Form::label('horario_cierre', 'a', ['class' => 'label']) !!}
                    {!! Form::time('horario_cierre', null, ['class' => 'input']) !!}
                </div>

                {!! Form::inEmail('correo_electronico_empresa', null, 'Correo eléctronico de la empresa', 'col-12 pr-2 pl-2') !!}

                {!! Form::inText('direccion_empresa', null, 'Direccion de la empresa', 'col-12 pr-2 pl-2') !!}

                {!! Form::inText('pag_web_empresa', null, 'Página web de la empresa', 'col-12 pr-2 pl-2') !!}


                {!! Form::submit('Actualizar información', ['class' => 'btn btn--accent']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</section>

    @component('components.modal', [
        'id' => 'modal-logo',
        'title' => 'Actualizar logotipo',
        'imagen' => $perfilEmpresa->logo_empresa,
        'url' => 'perfil-empresa.save-image',
        'perfil' => $perfilEmpresa->slug_empresa,
        'label' => 'Subir logotipo de la empresa'
    ])
    @endcomponent
@endsection
