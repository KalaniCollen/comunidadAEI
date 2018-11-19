@extends('layouts.head')
@section('styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}

<link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset ('css/privacity.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}"/>


@endsection

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cuenta</div>

                <a href="{{ route('perfil-usuario.edit', $perfil->slug_usuario) }}" class="btn btn-primary">Editar</a>
                <div style="float:right; width: auto; margin-right: 8px;" title="@if($perfil->privacidad==" 0")  Sus datos de contacto son mostrados al publico
                @else Sus datos de contacto no son mostrados al publico @endif">
                    <div id="privacidad" style="text-align:center;"> Privacidad: @if($perfil->privacidad=="0")Publico
                            @else Privado
                            @endif
                    </div>
                    <div class="onoffswitch">
                        <input type="checkbox" name="privacidad" class="onoffswitch-checkbox" id="myonoffswitch" value="1" @if($perfil->privacidad=="0") checked @endif>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                    </div>
            </div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif


            </div>
            <input type="hidden" id="id" value="{{ auth()->user()->id_usuario }}">
            <div class="panel-body" align="center">
                <div class="container2" id="container2">
                    <div id="Carga">
                        <img src="{{ $perfil->imagen }}" alt="Avatar" class="img-thumbnail" id="matrix" style="  border-radius:150px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px ;">
                        &nbsp;<label id="namedato" data="user">
                            <p id="namecampo" data="nombre">nombre: </p>
                        </label>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label id="namedata" class="user">{{ $user->name }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        &nbsp;<label id="Apellido_Paternodato" data="user">
                            <p id="Apellido_Paternocampo" data="Apellido Paterno">Apellido Paterno:</p>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label id="Apellido_Paternodata" name="user">{{ $user->apellido_paterno }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        &nbsp;<label id="Apellido_Maternodato" data="user">
                            <p id="Apellido_Maternocampo" data="Apellido Materno">Apellido Materno:</p>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label id="Apellido_Maternodata" name="user">{{ $user->apellido_materno }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        &nbsp;<label id="fecha" data="perfil">
                            <p id="fecha" data="fecha">Fecha Nacimiento:</p>
                        </label>
                    </Div>
                    <div class="col-md-4 col-sm-6">
                        <div id="fecha" class="eff" data="boton02">
                            <label id="fecha" class="perfil">{{ $perfil->fecha_nacimiento }}</label>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        &nbsp;<label id="Sexodato" data="perfil">
                            <p id="Sexocampo" data="Sexo">Sexo:</p>
                        </label>
                    </Div>
                    <div class="col-md-4 col-sm-6">
                        <div id="Sexo" class="eff" data="boton02">
                            <label id="Sexodata" class="perfil">{{ $perfil->sexo }}</label>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        <div>
                            &nbsp;<label id="Telefono_Movildato" data="perfil">
                                <p id="Telefono_Movilcampo" data="Telefono Movil">Telefono Movil:</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div id="telefono_movil" class="eff" data="boton05">
                            <label id="Telefono_Movildata" data="{{ $perfil->telefono_movil }}" name="perfil">{{ $perfil->telefono_movil }}</label>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                        <div>
                            &nbsp;<label id="Correo_Electronicodato" data="perfil">
                                <p id="Correo_Electronicocampo" data="Correo Electronico ">Correo Electronico:</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div id="correo_electronico" class="eff" data="boton07">
                            <label id="Correo_Electronicodata" data="{{ auth()->user()->email }}" name="perfil">{{ auth()->user()->email }}</label>&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}
@include('perfiles.layout', ['perfil' => $perfil])


@endsection
@section('scripts')


<script src="{{ asset('js/Perfil.js')}}" type="text/javascript"></script>
<script>
var url="{{asset('')}}";
</script>

@endsection
