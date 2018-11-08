@extends('layouts.app')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/enlaces.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/logros.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjetadesplegar.css')}}"/>
    @endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi empresa</div>

                  <button id="Tarjeta"  class="btn btn-primary">Contacto</button>
                  <button class="btn btn-primary" id="abrir" data-toggle="modal" data-target="#modalForm">
                    Redes Sociales
                  </button>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
                <div class="panel-body" align="center">
                            <div class="container2" id="container2">

                      <div id="Carga">
                      <img src="{{ $perfilE->logo_empresa }}" alt="Avatar" class="img-thumbnail" id="matrix" style="  border-radius:100px;">
                    </div>
                      <div class="overlay overlayFade" id="Ventana">
                          <div class="text">Cambiar foto</div>
                      </div>

                  				  </div>

                  					<div id="uploaded_image"></div>
                  				</div>
                          <div id="uploadimageModal" class="modal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Subir y ajustar imagen </h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">


                          <div id="image_demo" ></div>


                        <div class="col-md-2" style="padding-top:30px;">
                          <br />

                          <br />
                          <br/>

                      </div>

                    </div>
                    <div class="modal-footer">
                      <button style="background-color:transparent;border:0;width:85px;height:0px;">
                  <label for="upload_image" class="btn btn-primary"> Subir</label>
                        <input type="file" name="imagen" class="form-control-file" id="upload_image" style="color: transparent;width:0px;visibility: hidden;" />
                      </button>
                      <button class="btn btn-success crop_image">Guardar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                </div>
                      </div>

                </div>
            </div>
            </div>
        @include('Modal.tarjeta')
        <form class="form-horizontal" method="POST" action="{{ route('Actualizar') }}">
            {{ csrf_field() }}
{{ method_field('PUT') }}
            <div class="form-group{{ $errors->has('nombre_empresa') ? ' has-error' : '' }}">
                <label for="nombre_empresa" class="col-md-4 control-label">nombre Empresa</label>

                <div class="col-md-6">
                    <input id="nombre_empresa" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="nombre_empresa" value="{{ $perfilE->nombre_empresa}}" >

                    @if ($errors->has('nombre_empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre_empresa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('tipo_empresa') ? ' has-error' : '' }}">
                <label for="tipo_empresa" class="col-md-4 control-label">Tipo Empresa</label>

                <div class="col-md-6">
                  <select id="tipo_empresa" name="tipo_empresa" class="form-control" style="width:auto;">
                      <option value="{{ $perfilE->tipo_empresa}}" selected >{{ $perfilE->tipo_empresa}}</option>
                      <option  value=" @if($perfilE->tipo_empresa=="PRIVADA")PUBLICA @else PRIVADA @endif">@if($perfilE->tipo_empresa=="PRIVADA")PUBLICA @else PRIVADA @endif</option>
                  </select>
                    {{-- <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required> --}}

                    @if ($errors->has('tipo_empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tipo_empresa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('giro_empresa') ? ' has-error' : '' }}">
                <label for="giro_empresa" class="col-md-4 control-label">Giro</label>

                <div class="col-md-6">
                  <select id="giro_empresa" name="giro_empresa" class="form-control" style="width:auto;" >
                      <option value="{{ $perfilE->giro_empresa}}" selected > {{ $perfilE->giro_empresa}}</option>
                      <option  value="@if($perfilE->giro_empresa=="COMERCIAL")INDUSTRIAL @else @if($perfilE->giro_empresa=="SERVICIO")INDUSTRIAL  @else @if($perfilE->giro_empresa=="INDUSTRIAL")COMERCIAL @endif @endif @endif ">@if($perfilE->giro_empresa=="COMERCIAL")INDUSTRIAL @else @if($perfilE->giro_empresa=="SERVICIO")INDUSTRIAL  @else @if($perfilE->giro_empresa=="INDUSTRIAL")COMERCIAL @endif @endif @endif</option>
                      <option  value="@if($perfilE->giro_empresa=="COMERCIAL")SERVICIO @else @if($perfilE->Giro_Empresao=="SERVICIO")COMERCIAL @else @if($perfilE->giro_empresa=="INDUSTRIAL")SERVICIO @endif @endif @endif">@if($perfilE->giro_empresa=="COMERCIAL")SERVICIO @else @if($perfilE->giro_empresa=="SERVICIO")COMERCIAL @else @if($perfilE->giro_empresa=="INDUSTRIAL")SERVICIO @endif @endif @endif</option>
                  </select>
                    {{-- <input id="giro_empresa" type="text" class="form-control" name="giro_empresa" value="{{ old('apellido_materno') }}" required> --}}

                    @if ($errors->has('giro_empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('giro_empresa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('servicio_empresa') ? ' has-error' : '' }}">
              <input id="Servicio" type="checkbox" for="servicio_empresa" onclick="servicio()" name="Servicio" value="1"@if ($perfilE->servicio_empresa=="NINGUNO" or $perfilE->servicio_empresa=="Ninguno" or $perfilE->servicio_empresa=="")       @else  checked        @endif   ><label for="Notificacion"></label>

                <label for="servicio_empresa" class="col-md-4 control-label">Servicio</label>

                <div class="col-md-6">

                    <input id="servicio_empresa" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="servicio_empresa" value="{{ $perfilE->servicio_empresa }}" >

                    @if ($errors->has('servicio_empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('servicio_empresa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('producto_empresa') ? ' has-error' : '' }}">
              <input id="Producto" type="checkbox" for="producto_empresa" onclick="producto()" name="Producto" value="1"@if ($perfilE->producto_empresa=="NINGUNO" or $perfilE->producto_empresa=="Ninguno")       @else  checked        @endif   ><label for="Notificacion"></label>

                <label for="producto_empresa" class="col-md-4 control-label">Producto</label>

                <div class="col-md-6">

                    <input id="producto_empresa" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="producto_empresa" value="{{ $perfilE->producto_empresa }}" >

                    @if ($errors->has('producto_empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('producto_empresa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('horario_atencion') ? ' has-error' : '' }}">

                <label for="horario_atencion" class="col-md-4 control-label">Horario </label>

                <div class="col-md-6">

                    <input id="horario_atencion" type="textarea" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="horario_atencion" value="{{ $perfilE->horario_atencion }}" placeholder="8:00HR-20:00HR" >
                    @if ($errors->has('horario_atencion'))

                        <span class="help-block">
                            <strong>{{ $errors->first('horario_atencion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @if(auth()->user()->tipo_usuario=="Asociado")
              <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">

                  <label for="descripcion" class="col-md-4 control-label">descripcion</label>

                  <div class="col-md-6">

                      <textarea id="descripcion" type="textarea" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="descripcion" value="{{ $perfilE->descripcion }}" style="" ></textarea>
                      @if ($errors->has('descripcion'))

                          <span class="help-block">
                              <strong>{{ $errors->first('descripcion') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
          @endif
          <div class="form-group{{ $errors->has('telefono_fijo_empresa') ? ' has-error' : '' }}">

              <label for="telefono_fijo_empresa" class="col-md-4 control-label">Telefono Fijo</label>

              <div class="col-md-6">

                  <input id="telefono_fijo_empresa" type="number" min="0" class="form-control" name="telefono_fijo_empresa" value="{{ $perfilE->telefono_fijo_empresa }}" style="" >

                  @if ($errors->has('telefono_fijo_empresa'))
                      <span class="help-block">
                          <strong>{{ $errors->first('telefono_fijo_empresa') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group{{ $errors->has('correo_electronico_empresa') ? ' has-error' : '' }}">

              <label for="correo_electronico_empresa" class="col-md-4 control-label">Correo Empresa</label>

              <div class="col-md-6">

                  <input id="correo_electronico_empresa" type="text" class="form-control" name="correo_electronico_empresa" value="{{ $perfilE->correo_electronico_empresa }}" style="" >

                  @if ($errors->has('correo_electronico_empresa'))
                      <span class="help-block">
                          <strong>{{ $errors->first('correo_electronico_empresa') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group{{ $errors->has('direccion_empresa') ? ' has-error' : '' }}">

              <label for="direccion_empresa" class="col-md-4 control-label">direccion</label>

              <div class="col-md-6">

                  <input id="direccion_empresa" type="text" class="form-control" name="direccion_empresa" value="{{ $perfilE->direccion_empresa }}" style="" >

                  @if ($errors->has('direccion_empresa'))
                      <span class="help-block">
                          <strong>{{ $errors->first('direccion_empresa') }}</strong>
                      </span>
                  @endif
              </div>
          </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
                      <div>




              <br />
            @include('Modal.RedesSociales')

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
var url="{{asset('')  }}";
</script>
    <script src="{{ asset('js/croppie.js')}}" ></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js')}}" ></script> --}}
    <script src="{{ asset('js/PerfilEm0.js')}}" ></script>
    <script src="{{ asset('js/cropE.js')}}" type="text/javascript"></script>
  @endsection
