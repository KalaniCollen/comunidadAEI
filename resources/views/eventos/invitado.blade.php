@extends('layouts.app')
@section('styles')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Invitado</div>
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





                        <form class="form-horizontal" method="POST" action="{{ route('registrar.invitado', $id_evento) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre_invitado') ? ' has-error' : '' }}">
                                <label for="nombre_invitado" class="col-md-4 control-label">Nombre </label>
                                <div class="col-md-6">
                                    <input id="nombre_invitado" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="nombre_invitado"  >
                                    @if ($errors->has('nombre_invitado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre_invitado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('apellido_invitado') ? ' has-error' : '' }}">
                                <label for="apellido_invitado" class="col-md-4 control-label">Apellidos</label></label>
                                <div class="col-md-6">
                                    <input id="apellido_invitado" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="apellido_invitado" >
                                    @if ($errors->has('apellido_invitado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('apellido_invitado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('correo_invitado') ? ' has-error' : '' }}">
                                <label for="correo_invitado" class="col-md-4 control-label">Correo electronico</label>
                                <div class="col-md-6">
                                    <input id="correo_invitado" type="email"  class="form-control" name="correo_invitado"  >
                                    @if ($errors->has('correo_invitado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('correo_invitado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('edad_invitado') ? ' has-error' : '' }}">
                                <label for="edad_invitado" class="col-md-4 control-label">Edad</label>
                                <div class="col-md-6">
                                    <input id="edad_invitado" type="number" min="0" max="99" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="edad_invitado" >
                                    @if ($errors->has('edad_invitado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('edad_invitado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexo_invitado') ? ' has-error' : '' }}">
                                <label for="sexo_invitado" class="col-md-4 control-label">Sexo</label>
                                <div class="col-md-6" style="width:110px;">
                                    <select id="sexo_invitado" name="sexo_invitado" class="form-control" style="width:auto;">
                                        <option value="M" selected >Mujer</option>
                                        <option  value="H">Hombre</option>
                                        </select>
                                        @if ($errors->has('sexo_invitado'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sexo_invitado') }}</strong>
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

            @endsection
