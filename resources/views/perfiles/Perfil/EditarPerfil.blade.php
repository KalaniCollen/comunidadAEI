@extends('layouts.head')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('css/privacity.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('css/enlaces.css')}}" />

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Configurar Cuenta</div>

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
                <form class="form-horizontal" method="POST" action="{{ route('ActualizarPerfil') }}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Nombre </label>
                              <div class="col-md-6">
                                  <input id="name" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="name" value="{{ $user->name}}" >
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
                              <label for="apellido_paterno" class="col-md-4 control-label">Apellido Paterno</label>
                              <div class="col-md-6">
                                  <input id="apellido_paterno" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno}}" >
                                  @if ($errors->has('apellido_paterno'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('apellido_paternome') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
                              <label for="apellido_materno" class="col-md-4 control-label">Apellido Materno</label>
                              <div class="col-md-6">
                                  <input id="apellido_materno" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno}}" >
                                  @if ($errors->has('apellido_materno'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('apellido_materno') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                              <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>
                              <div class="col-md-6">
                                  <input id="fecha_nacimiento" type="date"  class="form-control" name="fecha_nacimiento" value="{{ $perfil->fecha_nacimiento}}" >
                                  @if ($errors->has('fecha_nacimiento'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                              <label for="sexo" class="col-md-4 control-label">Sexo</label>
                              <div class="col-md-6" style="width:110px;">
                                  <select  name="sexo" class="form-control" style="width:auto;">
                                      <option value="{{ $perfil->sexo}}" selected > {{ $perfil->sexo}}</option>
                                      <option  value=" @if($perfil->sexo=="H")M @else H @endif">@if($perfil->sexo=="H")M @else H @endif</option>
                                  </select>
                                  @if ($errors->has('sexo'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('sexo') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('telefono_movil') ? ' has-error' : '' }}">
                              <label for="telefono_movil" class="col-md-4 control-label">Telefono Movil</label>
                              <div class="col-md-6">
                                  <input id="telefono_movil" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="telefono_movil" value="{{ $perfil->telefono_movil}}" >
                                  @if ($errors->has('telefono_movil'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('telefono_movil') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('correo_electronico') ? ' has-error' : '' }}">
                              <label for="correo_electronico" class="col-md-4 control-label">Correo Electronico</label>
                              <div class="col-md-6">
                                   <label class="col-md-4 control-label" style="text-transform:inherit;">{{auth()->user()->email  }}</label>
                                   <a href="/cambiarcorreo" class="btn btn-primary"> Cambiar correo</a>

                                  {{-- <input id="correo_electronico" type="text"placeholder="example@dominio.com" class="form-control" name="correo_electronico" value="{{ $perfil->correo_electronico}}" > --}}
                                  @if ($errors->has('correo_electronico'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('correo_electronico') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Nombre Empresa</label>
                              <div class="col-md-6">
                                  <label for="correo_electronico" class="col-md-4 control-label">**********</label>

                                  <a href="/cambiarpassword" class="btn btn-primary"> Cambiar contraseña</a>
                                  {{-- <input id="password" type="password"  class="form-control" name="password" value="***************}" > --}}
                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Guardar
                                  </button>
                                  <a href="/Cuenta/{{ auth()->user()->slug_empresa }}" class="btn btn-primary">
                                          Cancelar

                                  </a>

                              </div>
                          </div>
                      </form>
</div>



            </div>
        </div>
    </div>
</div>


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
