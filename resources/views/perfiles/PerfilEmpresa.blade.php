@extends('layouts.head')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/enlaces.css')}}"/>
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
                  <div style="float:right; width: auto; padding-right:10px;" >
                    <a href="/PerfilShow/{{ $perfilE->slug_empresa }}" class="btn btn-primary">Editar</a>
</div>
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
                      <img src="{{ $perfilE->logo_empresa }}" alt="Avatar" onerror="this.src='/storage/img/DefaultEmpresa.png'" class="img-thumbnail" id="matrix" style="  border-radius:100px;">
                    </div>


                  				  </div>


                  				</div>

        @include('Modal.tarjeta')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id" value="{{ auth()->user()->id_usuario }}">
                <div>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                      &nbsp;<label >nombre: </label>

                  </div>
                    <div class="col-md-4 col-sm-6">

               <label >{{ $perfilE->nombre_empresa }}</label>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >Tipo:</label>

            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->tipo_empresa }}</label>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >Giro: </label>

            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->giro_empresa }}</label>

              </div>
            </div>
    @if( $perfilE->servicio_empresa=="NINGUNO" or $perfilE->servicio_empresa=="Ninguno" )
    @else
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >Servicio: </label>


            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->servicio_empresa }}</label>


              </div>
            </div>
          @endif
            @if( $perfilE->producto_empresa=="NINGUNO" or $perfilE->producto_empresa=="Ninguno" )
            @else
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >Producto: </label>

            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->producto_empresa }}</label>

            </div>
          </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                  &nbsp;<label >Horario de Atención: </label>

              </div>
              <div class="col-md-4 col-sm-6">

                <label >{{ $perfilE->horario_atencion }}</label>

              </div>
            </div>
          @endif
            @if(auth()->user()->tipo_usuario=="Asociado")
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                  &nbsp;<label>descripcion: </label>
              </div>
              <div class="col-md-4 col-sm-6">

                <label> {{ $perfilE->descripcion }}</label>


              </div>
            </div>
          @endif

            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >Telefono Fijo:</p> </label>

            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->telefono_fijo_empresa }}</label>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                  &nbsp;<label >Correo Electronico: </label>

              </div>
              <div class="col-md-6 col-sm-6">
                <label>{{ $perfilE->correo_electronico_empresa }}</label>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">

                &nbsp;<label >direccion:</p></label>

            </div>
            <div class="col-md-4 col-sm-6">

                  <label >{{ $perfilE->direccion_empresa }}</label>


              </div>
            </div>
              <br />
            @include('Modal.RedesSociales')

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
var url="{{asset('')  }}";
</script>
<script src="{{ asset('js/PerfilEm.js')}}" harset="utf-8" ></script>

  @endsection
