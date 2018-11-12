@extends('layouts.head')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}" />


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
                <div class="panel-body" align="center">

                <form class="form-horizontal" method="POST" action="{{ route('cambiarpassword') }}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          <div class="form-group{{ $errors->has('mypassword') ? ' has-error' : '' }}">
                              <label for="mypassword" class="col-md-4 control-label">Contraseña actual</label>
                              <div class="col-md-6">
                                  <input id="mypassword" type="password" class="form-control" name="mypassword" value="" >
                                  @if ($errors->has('mypassword'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('mypassword') }}</strong>
                                      </span>
                                  @endif



                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Contraseña Nueva</label>
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password"  >
                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                              <label for="password_confirmation" class="col-md-4 control-label">Confirmar contraseña</label>
                              <div class="col-md-6">
                                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  >
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


@endsection
