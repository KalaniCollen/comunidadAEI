@extends('layouts.app')
@section('content')
<section class="section profile profile--section">

    <div id="js-modal-change-cover" class="iziModal">
        <div>
            <img id="cover-pic" src="/img/login-goal.jpg" alt="Foto de portada de la empresa">
        </div>
        <button class="btn" id="js-save-cover-pic"><i class="btn__icon ion-md-save"></i> Guardar imagen</button>
        <label for="cover-in" class="btn">
            <input style="visibility" type="file" name="cover-in" id="js-upload-cover-pic" accept="image/*">
        </label>
        <button class="btn" data-izimodal-close=""><i class="btn__icon ion-md-trash"></i> Cancelar</button>
    </div>

    <div id="js-modal-change-picture" class="iziModal">
        <div>
            <img src="{{ $perfilEmpresa->logo_empresa }}" alt="" id="profile-pic">
        </div>
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
            <button class="btn btn--accent" data-izimodal-open="#js-modal-change-picture"><i class="btn__icon ion-md-camera"></i> Actualizar logo</button>
        </div>
        <div class="profile__content ">

            {!! Form::model($perfilEmpresa, ['route' => ['perfil-empresa.update', $perfilEmpresa->slug_empresa], 'class' => 'row', 'method' => 'PUT']) !!}
                {!! Form::inText('nombre_empresa', null, 'Nombre de la empresa', 'col-md-6 col-lg-6') !!}

                {!! Form::inSelect('tipo_empresa', null, 'Tipo de empresa', ['PUBLICA' => 'PUBLICA', 'PRIVADA' => 'PRIVADA', 'MIXTA' => 'MIXTA'], 'col-md-6 col-lg-6') !!}

                {!! Form::inSelect('giro_empresa', null, 'Giro de la empresa', ['Minería' => 'Minería', 'Pesca' => 'Pesca', 'Bienes Raíces' => 'Bienes Raíces', 'Constucción' => 'Construcción', 'Ganadería' => 'Ganadería', 'Transporte' => 'Transporte', 'Software' => 'Software'], 'col-md-6 col-lg-6' ) !!}

                <div class="group col-md-6 col-lg-6">
                    <p class="w-100">¿Que ofrece su empresa?</p>
                    {!! Form::inCheck('servicio_empresa', 0, 'Servicios') !!}
                    {!! Form::inCheck('producto_empresa', 0, 'Productos') !!}
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
        function previewImage(input, img) {
            if(input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(el) {
                    document.getElementById(img).src = el.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $coverpic = $('#cover-pic');
        $("#js-modal-change-cover").iziModal({
            title: 'Cambiar foto de portada',
            icon: 'ion-md-camera',
            zindex: 1004,
            onOpening: function() {
                $('#cover-pic').croppie({
                    viewport: {
                        width: 150,
                        height: 200
                    }
                });
            },
            onClosing: function() {
                coverCrop.destroy();
            }
        });

        // let croppieOpts =  {
        //         viewport: {
        //             width: 1200,
        //             height: 220
        //         },
        //         boundary: {
        //             width: 1300,
        //             height: 300
        //         },
        //         enforceBoundary: true,
        //     };
        //
        //
        // let croppieC;
        // let c;
        // let modal = $('#js-modal-change-cover').iziModal({
        //     title: 'Cambiar foto de portada',
        //     icon: 'ion-md-camera',
        //     width: '100%',
        //     padding: '10px',
        //     zindex: 1004,
        //     onOpening: function(){
        //         croppieC = new Croppie(document.getElementById('cover-pic'), croppieOpts);
        //     },
        //     onClosed: function() {
        //         // croppieC.destroy();
        //     }
        // });
        //
        // let modalPicture = $("#js-modal-change-picture").iziModal({
        //     title: 'Actualizar Logotipo',
        //     iocon: 'ion-md-camera',
        //     zindex: 1004,
        //     onOpening: function() {
        //         // c = new Croppie(document.getElementById('#profile-pic'), {
        //         //     viewport: {
        //         //         width: 140,
        //         //         height: 140
        //         //     },
        //         //     boundary: {
        //         //         width: 180,
        //         //         height: 180
        //         //     },
        //         //     enforceBoundary: true,
        //         // });
        //     }
        // });
        @if (Session::has('info'))
        iziToast.success({
            title: '{{ session('info') }}',
            position: "topRight"
        });
        @endif

    </script>

@endsection
