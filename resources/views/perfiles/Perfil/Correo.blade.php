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
                <div class="panel-heading">Cambiar correo</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="panel-body" align="center">

                <form class="form-horizontal" method="POST" action="{{ route('cambiarcorreo') }}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">Nuevo correo electronico </label>
                              <div class="col-md-6">
                                  <input id="email" type="text" class="form-control" name="email" value="{{ Auth()->user()->email}}" >
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
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


@endsection
