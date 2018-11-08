@extends('layouts.app')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/croppie.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/css.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/privacity.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjeta.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/enlaces.css')}}"/>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil Usuario</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="float:right; width: auto;" title="@if($perfil->Privacidad=="0") Sus datos de contacto son mostrados al publico @else Sus datos de contacto no son mostrados al publico @endif">
                      <div id="privacidad" style="text-align:center;"> Privacidad:  @if($perfil->Privacidad=="0")Publico @else Privado @endif </div>
                        <div class="onoffswitch" >
                            <input type="checkbox" name="Privacidad" class="onoffswitch-checkbox" id="myonoffswitch" value="1" @if($perfil->Privacidad=="0") checked @endif>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                        </div>
                </div>


                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" id="id" value="{{ auth()->user()->id_usuario }}">

        <div class="panel-body" align="center">
                    <div class="container2" id="container2">

              <div id="Carga">
              <img src="{{ $perfil->Imagen }}" alt="Avatar" class="img-thumbnail" id="matrix" style="  border-radius:150px;">
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
                <input type="file" name="Imagen" class="form-control-file" id="upload_image" style="color: transparent;visibility: hidden;" />
              </button>
              <button class="btn btn-success crop_image">Guardar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

        </div>
              </div>

        </div>
    </div>
    </div>

<div class="row">
  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px ;width:auto;">
                <div>
                &nbsp;<label id="namedato" data="user"><p id="namecampo" data="Nombre">Nombre: </p></label>
                </div>
                  </div>
                   <div class="col-md-6 col-sm-6" style="left:100px">
                  <div id="name" class="eff" data="boton01">

                <label id="namedata"  class="user">{{ $user->name }}</label>
                <input type="button" name="name" id="boton01" class="boton01" value="Editar" >
              </div>
</div>
               </div>
               <div class="row">
                 <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                               <div>
               &nbsp;<label id="Apellido_Paternodato" data="user" ><p id="Apellido_Paternocampo" data="Apellido Paterno">Apellido Paterno:</p> </label>
            </div>
          </div>
            <div class="col-md-4 col-sm-6">
               <div id="Apellido_Paterno" class="eff" data="boton03">

                <label id="Apellido_Paternodata" name="user">{{ $user->Apellido_Paterno }}</label>

               <input type="button" name="Apellido_Paterno" id="boton03" class="boton01" value="Editar">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
            <div>
              &nbsp;<label id="Apellido_Maternodato" data= "user" ><p id="Apellido_Maternocampo" data="Apellido Materno">Apellido Materno:</p>  </label>
            </div>
          </div>
            <div class="col-md-4 col-sm-6">
              <div id="Apellido_Materno" class="eff" data="boton04">
                <label id="Apellido_Maternodata"  name="user">{{ $user->Apellido_Materno }}</label>
              <input type="button" name="Apellido_Materno" id="boton04" class="boton01" value="Editar">
             </div>
           </div>
         </div>

         <div class="row">
           <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
           <div>
             &nbsp;<label id="Sexodato" data="perfil" ><p id="Sexocampo" data="Sexo">Sexo:</p></label>
           </div>
         </Div>
         <div class="col-md-4 col-sm-6">
               <div id="Sexo" class="eff" data="boton02" >
                 <label id="Sexodata" class="perfil">{{ $perfil->Sexo }}</label>&nbsp;
               <input type="button" name="Sexo" id="boton02" class="boton01" value="Editar">
               </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
          <div>
             &nbsp;<label id="Telefono_Movildato" data= "perfil" ><p id="Telefono_Movilcampo" data="Telefono Movil">Telefono Movil:</p>  </label>
           </div>
         </div>
            <div class="col-md-4 col-sm-6">
             <div id="Telefono_Movil" class="eff" data="boton05">
              <label id="Telefono_Movildata" data="{{ $perfil->Telefono_Movil }}" name="perfil">{{ $perfil->Telefono_Movil }}</label>&nbsp;
             <input type="button" name="Telefono_Movil" id="boton05" class="boton01" value="Editar">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
          <div>
            &nbsp;<label id="Correo_Electronicodato" data= "perfil" ><p id="Correo_Electronicocampo" data="Correo Electronico ">Correo Electronico:</p>  </label>
          </div>
        </div>
          <div class="col-md-4 col-sm-6">
            <div id="Correo_Electronico" class="eff" data="boton07">
             <label id="Correo_Electronicodata" data="{{ $perfil->Correo_Electronico }}" name="perfil">{{ $perfil->Correo_Electronico }}</label>&nbsp;
            <input type="button" name="Correo_Electronico" id="boton07" class="boton01" value="Editar">
           </div>
</div>
</div>


            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

    <script src="{{ asset('js/croppie.js')}}" ></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js')}}" ></script> --}}
    <script src="{{ asset('js/Perfil.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/crop.js')}}" type="text/javascript"></script>
    <script>
    var url="{{asset('')}}";
    </script>
  @endsection
