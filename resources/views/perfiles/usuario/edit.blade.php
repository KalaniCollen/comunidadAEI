@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Editar Perfil</h1>
        </div>
        <div id="js-modal-change-picture" class="iziModal">
            <div>
                <img id="croppie-picture" src="{{ $perfil_usuario->imagen }}" alt="Imagen de perfil">
            </div>

            <div class="group">
                <p class="w-100 label">Imagen de perfil</p>
                <label for="js-input-file" class="file">
                    <i class="file__icon ion-md-cloud-upload"></i>
                    <input type="file" class="input" name="imagen" id="js-input-file" accept="image/*" size="2000000" onchange="previewImageOnlyText(this, 'js-file-text');">
                </label>
                <span class="file__text" id="js-file-text"></span>
            </div>
            <button class="btn" id="js-save-image">Guardar imagen</button>
            <button class="btn" data-izimodal-close="">Cancelar</button>
        </div>

        <div class="row card--profile no-gutters">
            <div class="col-md-12 col-lg-12 profile__info d-flex flex-column">
                <img src="{{ $perfil_usuario->imagen }}" alt="Imagen de perfil del usuario {{ $perfil_usuario->usuario->name }}" class="profile__image" width="180px" style="border-radius: 50%; margin-bottom: 16px;" id="js-image-profile">
                <h2 class="mb-2">{{ $perfil_usuario->usuario->name }} {{ $perfil_usuario->usuario->apellido_paterno }} {{ $perfil_usuario->usuario->apellido_materno }}</h2>
                <a href="#" id="js-change-profile-picture" class="btn" data-izimodal-open="#js-modal-change-picture"><i class="btn__icon ion-md-camera"></i> Cambiar foto de perfil</a>
            </div>
        </div>

        <div class="section__body">
            {!! Form::open(['route' => ['perfil-usuario.update', $perfil_usuario->slug_usuario], 'method' => 'PUT', 'class' => 'row no-gutters']) !!}

                <p class="montserrat-light mb-3 h2 col-12">Datos Personales</p>

                <div class="col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::inText('name', $perfil_usuario->usuario->name, 'Nombre') !!}
                </div>

                <div class="col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::inText('apellido_paterno', $perfil_usuario->usuario->apellido_paterno, 'Apellido Paterno') !!}
                </div>

                <div class="col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::inText('apellido_materno', $perfil_usuario->usuario->apellido_materno, 'Apellido Materno') !!}
                </div>

                <div class="group col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento', ['class' => 'label']) !!}
                    {!! Form::date('fecha_nacimiento', Date::parse($perfil_usuario->fecha_nacimiento)->format('Y-m-d'), ['class' => 'input']) !!}
                </div>

                <div class="group col-md-6 col-lg-4 pl-2 pr-2">
                    <p class="label w-100">Sexo</p>
                    {!! Form::inRadio('sexo', 'H', strcmp($perfil_usuario->sexo, 'H') == 0 ? true : false, 'Hombre') !!}
                    {!! Form::inRadio('sexo', 'M', strcmp($perfil_usuario->sexo, 'M') == 0 ? true : false ,'Mujer') !!}
                </div>

                <div class="col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::inTel('telefono_movil', $perfil_usuario->telefono_movil, 'Teléfono móvil') !!}

                </div>
                <div class="col-md-6 col-lg-4 pl-2 pr-2">
                    {!! Form::inText('red_social', $perfil_usuario->red_social, 'Red Social', '', ['placeholder' => 'https://www.facebook.com/user']) !!}

                </div>

                <p class="montserrat-light mb-3 h2 col-12">Datos de la cuenta</p>


                <div class="group col-md-6 col-lg-4 pl-2 pr-2">
                    <p class="label">Correo Eléctronico</p>
                    <p class="w-100 lato">{{ $perfil_usuario->usuario->email }}</p>
                </div>

                <div class="group col-md-6 col-lg-4 pl-2 pr-2">
                    <p class="label">Contraseña</p>
                    <p class="w-100 lato h3">**********</p>
                </div>

                <div class="group col-md-6 col-lg-4 pl-2 pr-2">
                    <label for="privacidad" class="label w-100">Estado del perfil: </label>
                    {!! Form::inSwitch('privacidad', 0, $perfil_usuario->privacidad, 'publico') !!}
                </div>

                <div class="col-md-12 col-lg-12 pl-2 pr-2 mb-4">
                    {!! Form::inCheck('notificacion_correo', null,  $perfil_usuario->usuario->notificacion_correo, 'Notificaciones por correo') !!}
                </div>

                <div class="col-12 pr-2 pl-2 d-flex justify-content-center align-items-center">
                    {!! Form::submit('Actualizar perfil', ['class' => 'btn btn--accent mr-4']) !!}
                    <a href="{{ route('perfil-usuario.index') }}" class="btn">Cancelar</a>
                </div>

            {!! Form::close() !!}
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">

        $('#privacidad').on('click', function(e) {
            let self = $(this);
            if(!self.is(':checked')) {
                self.next().next()[0].innerText = "privado";
            } else {
                self.next().next()[0].innerText = "publico";
            }
        });

        @if (session('status'))
            iziToast.success({
                title: {{ session('status') }},

            });
        @endif

        let crp;
        $('#js-modal-change-picture').iziModal({
            title: 'Cambiar foto de perfil',
            icon: 'ion-md-camera',
            zindex: 1004,
            padding: '1%',
            onOpening: function() {
                let image = document.getElementById('croppie-picture');
                let input = document.getElementById('js-input-file');
                crp = new Croppie(document.getElementById('croppie-picture'), {
                    boundary: { width: 260, height: 260 },
                    viewport: { width: 180, height: 180, type: 'circle' },
                });


                $('#js-input-file').on('change', function(e) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        crp.bind({
                            url: event.target.result
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                $('#js-save-image').on('click', function(){
                    $('#js-input-file').val('');
                    let res = crp.result({
                        type: 'base64',
                        size: 'viewport',
                        circle: true
                    }).then(function(response) {
                        console.log(response);
                        $.ajax({
                            method: 'PUT',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                            url: `{{ route('perfil-usuario.save-image', $perfil_usuario->slug_usuario) }}`,
                            data: {
                                imagen: response
                            },
                            success: function(res) {
                                $('#js-modal-change-picture').iziModal('close');
                                iziToast.success({
                                    title: res,
                                    timeout: 3000,
                                    displayMode: 'once',
                                    onClosing: function () {
                                        location.reload();
                                    }
                                });
                                $('#js-image-profile').attr('src', response);
                            }
                        });
                    });
                });
            },
            onClosed: function() {
                $('#js-input-file').val('');
                crp.destroy();
            }
        });
    </script>
@endsection
