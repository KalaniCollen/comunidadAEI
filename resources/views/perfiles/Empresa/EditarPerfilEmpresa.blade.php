@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjetadesplegar.css')}}"/>

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mi empresa</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
                        <form class="form-horizontal" method="POST" action="{{ route('perfil-empresa.update', $perfilE->slug_empresa) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group{{ $errors->has('nombre_empresa') ? ' has-error' : '' }}">
                                <label for="nombre_empresa" class="col-md-4 control-label">Nombre Empresa</label>
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
                                <div class="col-md-6" style="width:110px;">
                                    <select id="tipo_empresa" name="tipo_empresa" class="form-control" style="width:auto;">
                                        <option value="{{ $perfilE->tipo_empresa}}" selected >{{ $perfilE->tipo_empresa}}</option>
                                        <option  value=" @if($perfilE->tipo_empresa=="PRIVADA")PUBLICA @else PRIVADA @endif">@if($perfilE->tipo_empresa=="PRIVADA")PUBLICA @else PRIVADA @endif</option>
                                        </select>
                                        @if ($errors->has('tipo_empresa'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo_empresa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('giro_empresa') ? ' has-error' : '' }}">
                                    <label for="giro_empresa" class="col-md-4 control-label">Giro</label>
                                    <div class="col-md-6" style="width:110px;">
                                        <select id="giro_empresa" name="giro_empresa" class="form-control" style="width:auto;" >
                                            <option value="{{ $perfilE->giro_empresa}}" selected > {{ $perfilE->giro_empresa}}</option>
                                            <option  value="@if($perfilE->giro_empresa=="COMERCIAL")INDUSTRIAL @else @if($perfilE->giro_empresa=="SERVICIO")INDUSTRIAL  @else @if($perfilE->giro_empresa=="INDUSTRIAL")COMERCIAL @endif @endif @endif ">@if($perfilE->giro_empresa=="COMERCIAL")INDUSTRIAL @else @if($perfilE->giro_empresa=="SERVICIO")INDUSTRIAL  @else @if($perfilE->giro_empresa=="INDUSTRIAL")COMERCIAL @endif @endif @endif</option>
                                                <option  value="@if($perfilE->giro_empresa=="COMERCIAL")SERVICIO @else @if($perfilE->Giro_Empresao=="SERVICIO")COMERCIAL @else @if($perfilE->giro_empresa=="INDUSTRIAL")SERVICIO @endif @endif @endif">@if($perfilE->giro_empresa=="COMERCIAL")SERVICIO @else @if($perfilE->giro_empresa=="SERVICIO")COMERCIAL @else @if($perfilE->giro_empresa=="INDUSTRIAL")SERVICIO @endif @endif @endif</option>
                                                </select>
                                                @if ($errors->has('giro_empresa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('giro_empresa') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            @php
                                                $select = null;
                                                if($perfilE->producto_empresa == 1) {
                                                    $select = 'productos';
                                                }
                                                if ($perfilE->servicio_empresa == 1) {
                                                    $select = 'servicios';
                                                }
                                                if ($perfilE->producto_empresa == 1 && $perfilE->servicio_empresa == 1) {
                                                    $select = 'ambos';
                                                }
                                            @endphp

                                            {!! Form::label('oferta', '¿Que ofrece su empresa?', ['class' => 'control-label col-md-4']) !!}

                                            {!! Form::select('oferta', ['productos' => 'Productos', 'servicios' => 'Servicios', 'ambos' => 'Ambos'], $select, ['class' => 'col-md-6 form-control']) !!}


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
                                                <label for="descripcion" class="col-md-4 control-label">Descripcion</label>
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
                                            <label for="direccion_empresa" class="col-md-4 control-label">Direccion</label>
                                            <div class="col-md-6">
                                                <input id="direccion_empresa" type="text" class="form-control" name="direccion_empresa" value="{{ $perfilE->direccion_empresa }}" style="" >
                                                @if ($errors->has('direccion_empresa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('direccion_empresa') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('pag_web_empresa') ? ' has-error' : '' }}">
                                            <label for="pag_web_empresa" class="col-md-4 control-label">Pagina Web</label>
                                            <div class="col-md-6">
                                                <input id="pag_web_empresa" type="text" class="form-control"  name="pag_web_empresa" value="{{ $perfilE->pag_web_empresa}}" style="" >
                                                @if ($errors->has('pag_web_empresa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('pag_web_empresa') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('red_social_twitter_empresa') ? ' has-error' : '' }}">
                                            <label for="red_social_twitter_empresa" class="col-md-4 control-label">Twitter</label>
                                            <div class="col-md-6">
                                                <input id="red_social_twitter_empresa" type="text" class="form-control" name="red_social_twitter_empresa" value="{{ $perfilE->red_social_twitter_empresa }}" style="" >
                                                @if ($errors->has('red_social_twitter_empresa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('red_social_twitter_empresa') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('red_social_facebook_empresa') ? ' has-error' : '' }}">
                                            <label for="red_social_facebook_empresa" class="col-md-4 control-label">Facebook</label>
                                            <div class="col-md-6">
                                                <input id="red_social_facebook_empresa" type="text" class="form-control" placeholder="https://www.facebook.com/christophersanchez" name="red_social_facebook_empresa" value="{{ $perfilE->red_social_facebook_empresa }}" style="" >
                                                @if ($errors->has('red_social_facebook_empresa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('red_social_facebook_empresa') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>
                                                <a href="{{ route('perfil-empresa.index') }} }}" class="btn btn-primary">
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
                <script>
                var url="{{asset('')  }}";
                </script>
                <script src="{{ asset('js/croppie.js')}}" ></script>
                {{-- <script src="{{ asset('js/bootstrap.min.js')}}" ></script> --}}
                <script src="{{ asset('js/PerfilEm0.js')}}" ></script>
                <script src="{{ asset('js/cropE.js')}}" type="text/javascript"></script>
            @endsection
