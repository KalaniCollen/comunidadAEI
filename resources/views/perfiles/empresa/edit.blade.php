@extends('layouts.app')
@section('content')
<section class="section profile profile--section">
    {{-- Modal para Cover --}}
    <div id="js-modal-change-cover" class="iziModal">
        <div>
            <img id="cover-pic" src="/img/login-goal.jpg" alt="Foto de portada de la empresa">
        </div>
        <div class="group">
            <p class="w-100 label">Imagen de portada</p>
            <label for="js-upload-cover-pic" class="file">
                <i class="file__icon ion-md-cloud-upload"></i>
                <input type="file" class="input" name="cover" id="js-upload-cover-pic" accept="image/*" size="2000000" onchange="previewImageOnlyText(this, 'js-file-text');">
            </label>
            <span class="file__text" id="js-file-text"></span>
        </div>
        <button class="btn" id="js-save-cover-pic"><i class="btn__icon ion-md-save"></i> Guardar imagen</button>
        <button class="btn" data-izimodal-close=""><i class="btn__icon ion-md-trash"></i> Cancelar</button>
    </div>

    {{-- Modal para logotipo de la empresa  --}}
    <div id="js-modal-change-logo" class="iziModal">
        <div>
            <img src="{{ $perfilEmpresa->logo_empresa }}" alt="" id="logo-pic">
        </div>
        <div class="group">
            <p class="w-100 label">Imagen de perfil</p>
            <label for="js-upload-logo-pic" class="file">
                <i class="file__icon ion-md-cloud-upload"></i>
                <input type="file" class="input" name="logo_empresa" id="js-upload-logo-pic" accept="image/*" size="2000000" onchange="previewImageOnlyText(this, 'js-file-text');">
            </label>
            <span class="file__text" id="js-file-text"></span>
        </div>
        <button class="btn" id="js-save-logo-pic"><i class="btn__icon ion-md-save"></i> Guardar imagen</button>
        <button class="btn" data-izimodal-close=""><i class="btn__icon ion-md-trash"></i> Cancelar</button>
    </div>

    <div class="profile__cover" style="background-image: url('/img/login-goal.jpg');">
        <button class="btn btn--accent profile__cover-btn" data-izimodal-open="#js-modal-change-cover">
            <i class="btn__icon ion-md-create"></i> Cambiar foto de portada
        </button>
    </div>

    <div class="profile__information">
        <div class="profile__profile">
            <img src="{{ $perfilEmpresa->logo_empresa }}" alt="" class="profile__picture">
            <h1 class="profile__username">{{ $perfilEmpresa->nombre_empresa }}</h1>
            @isset($perfilEmpresa->pag_web_empresa)
                <a href="{{ $perfilEmpresa->pag_web_empresa }}" target="_blank" class="text--accent"><i class="ion-md-globe"></i> {{ $perfilEmpresa->pag_web_empresa }}</a>
            @endisset
            @isset($perfilEmpresa->direccion_empresa)
                <p><i class="ion-md-pin"></i> {{ $perfilEmpresa->direccion_empresa }}</p>
            @endisset
            <button class="btn btn--accent" data-izimodal-open="#js-modal-change-logo"><i class="btn__icon ion-md-camera"></i> Actualizar logo</button>
        </div>
        <div class="profile__content ">

            {!! Form::model($perfilEmpresa, ['route' => ['perfil-empresa.update', $perfilEmpresa->slug_empresa], 'class' => 'row', 'method' => 'PUT']) !!}
                {!! Form::inText('nombre_empresa', null, 'Nombre de la empresa', 'col-md-6 col-lg-6') !!}

                {!! Form::inSelect('tipo_empresa', null, 'Tipo de empresa', ['PUBLICA' => 'PUBLICA', 'PRIVADA' => 'PRIVADA', 'MIXTA' => 'MIXTA'], 'col-md-6 col-lg-6') !!}

                {!! Form::inSelect('giro_empresa', null, 'Giro de la empresa', ['Minería' => 'Minería', 'Pesca' => 'Pesca', 'Bienes Raíces' => 'Bienes Raíces', 'Constucción' => 'Construcción', 'Ganadería' => 'Ganadería', 'Transporte' => 'Transporte', 'Software' => 'Software'], 'col-md-6 col-lg-6' ) !!}

                <div class="group col-md-6 col-lg-6">
                    <p class="w-100">¿Que ofrece su empresa?</p>
                    {!! Form::inCheck('servicio_empresa', 0, null, 'Servicios') !!}
                    {!! Form::inCheck('producto_empresa', 0, null, 'Productos') !!}
                </div>

                {!! Form::inTel('telefono_fijo_empresa', null, 'Teléfono fijo', 'col-md-6 col-lg-6') !!}

                {!! Form::inText('horario_atencion', null, 'Horario de atención', 'col-md-6 col-lg-6', ['placeholder' => 'Ej. 08:00 - 20:00', 'pattern' => '([01]?[0-9]|2[0-3]):[0-5][0-9]) - ([01]?[0-9]|2[0-3]):[0-5][0-9])']) !!}

                {!! Form::inEmail('correo_electronico_empresa', null, 'Correo eléctronico de la empresa', 'col-md-6 col-lg-6') !!}

                {!! Form::inText('direccion_empresa', null, 'Direccion de la empresa', 'col-md-6 col-lg-6') !!}

                {!! Form::inText('pag_web_empresa', null, 'Página web de la empresa', 'col-md-6 col-lg-6') !!}


                {!! Form::submit('Actualizar información', ['class' => 'btn btn--accent']) !!}


            {!! Form::close() !!}

        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script type="text/javascript">

        let crp;
        $('#js-modal-change-logo').iziModal({
            title: 'Cambiar foto de portada',
            icon: 'ion-md-camera',
            zindex: 1004,
            padding: '1%',
            onOpening: function() {
                let image = document.getElementById('logo-pic');
                let input = document.getElementById('js-upload-logo-pic');
                crp = new Croppie(document.getElementById('logo-pic'), {
                    boundary: { width: 260, height: 260 },
                    viewport: { width: 180, height: 180, type: 'circle' },
                });

                $('#js-upload-logo-pic').on('change', function(e) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        crp.bind({
                            url: event.target.result
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                $('#js-save-logo-pic').on('click', function(){
                    $('#js-upload-logo-pic').val('');
                    let res = crp.result({
                        type: 'base64',
                        size: 'viewport',
                        circle: true
                    }).then(function(response) {
                        axios.put('{{ route('perfil-empresa.save-image', $perfilEmpresa->slug_empresa) }}', {
                            logo_empresa: response
                        }).then(function(res) {
                            $('#js-modal-change-logo').iziModal('close');
                            iziToast.success({
                                title: res.data,
                                timeout: 2000,
                                displayMode: 'once',
                                onClosing: function () {
                                    location.reload();
                                }
                            });
                            $('#logo-pic').attr('src', response);
                        });
                    });
                });
            },
            onClosed: function() {
                $('#js-upload-logo-pic').val('');
                crp.destroy();
            }
        });
    </script>
@endsection
