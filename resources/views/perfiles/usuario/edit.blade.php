@extends('layouts.head')
@section('styles')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/privacity.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/enlaces.css')}}" />

@endsection

@section('content')
    <section class="section">
        <h1 class="section__title">Configurar cuenta</h1>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" id="id" value="{{ auth()->user()->id_usuario }}">

        <div class="panel-body" align="center">
            <div class="container2" id="container2">

                <div id="Carga">
                    <img src="{{ $perfil->imagen }}" alt="Avatar" class="img-thumbnail" id="matrix" style="  border-radius:150px;">
                </div>
                <div class="overlay overlayFade" id="Ventana">
                    <div class="text">Cambiar foto</div>
                </div>

            </div>
            <div id="uploaded_image"></div>

            <div id="uploadimageModal" class="modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Subir y ajustar imagen </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">


                                <div id="image_demo"></div>


                                <div class="col-md-2" style="padding-top:30px;">
                                    <br />

                                    <br />
                                    <br />

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button style="background-color:transparent;border:0;width:85px;height:0px;">
                                    <label for="upload_image" class="btn btn-primary"> Subir</label>
                                    <input type="file" name="imagen" class="form-control-file" id="upload_image" style="color: transparent;visibility: hidden;" />
                                </button>
                                <button class="btn btn-success crop_image">Guardar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {!! Form::open(['route' => ['perfil-usuario.update', $perfil->slug_usuario], 'method' => 'PUT']) !!}
            <div class="group">
                {!! Form::label('name', 'Nombre', ['class' => 'label']) !!}
                {!! Form::text('name', auth()->user()->name, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'label']) !!}
                {!! Form::text('apellido_paterno', auth()->user()->apellido_paterno, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('apellido_materno', 'Apellido Materno', ['class' => 'label']) !!}
                {!! Form::text('apellido_materno', auth()->user()->apellido_materno, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento', ['class' => 'label']) !!}
                {!! Form::date('fecha_nacimiento', $perfil->fecha_nacimiento, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('sexo', 'Sexo', ['class' => 'label']) !!}
                {!! Form::select('sexo', ['hombre' => 'H', 'mujer' => 'M'], null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('telefono_movil', 'Teléfono móvil', ['class' => 'label']) !!}
                <input type="tel" name="telefono_movil" value="" required class="input">
            </div>


            {!! Form::submit('Actualizar información', ['class' => 'btn btn--ghost']) !!}


            {!! Form::close() !!}

            <div class="group">
                <p class="label">Correo eléctronico</p>
                <p>{{ auth()->user()->email }}
                <a href="{{ route('perfil-usuario.update-email') }}" class="btn btn--accent">Cambiar correo</a>
            </div>

            <div class="group">
                <p class="label">Cambiar contraseña</p>
                <p>***************</p>
                <a href="{{ route('perfil-usuario.index') }}" class="btn">Cambiar contraseña</a>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/croppie.js')}}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js')}}" ></script> --}}
    <script src="{{ asset('js/Perfil.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/crop.js')}}" type="text/javascript"></script>
    <script>
    var url = "{{asset('')}}";
</script>
@endsection
