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
                      <img src="{{ $perfilE->Logo_Empresa }}" alt="Avatar" class="img-thumbnail" id="matrix" style="  border-radius:100px;">
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
                        <input type="file" name="Imagen" class="form-control-file" id="upload_image" style="color: transparent;width:0px;visibility: hidden;" />
                      </button>
                      <button class="btn btn-success crop_image">Guardar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                </div>
                      </div>

                </div>
            </div>
            </div>
            <button id="Tarjeta">Contacto</button>
      <div id="Modelotarjeta" class="modal" role="dialog">



          <div class="contact-area">
        <div class="contact">
          <main>
            <section>
              <div class="content">
                <span class="close" id="cls">&times;</span>
                <div class="logo"><img src="/storage/img/Empresa.png" width="100" height="100" id="image"/></div>
                 <aside>
                <h1>Jenni Toral</h1>
                <p>Hola, soy Jenni Toral Diseñadora Grafica y Visual.</p>
              </aside>
                <button id="conectar">
                  <span>Contactame</span>

                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"> <g class="nc-icon-wrapper" fill="#444444"> <path d="M14.83 30.83L24 21.66l9.17 9.17L36 28 24 16 12 28z"></path> </g> </svg>
                </button>
              </div>

              <div class="title"><p>Contactame</p></div>
            </section>


          </main>

          <nav>
            <a href="#" class="gmail">
              <div class="icon"> <div class="icon"><img src="/storage/img/300.jpg" width="55" height="55" id="image"/></div>
              </div>

              <div class="content">
                <h1>Tel�fono Fijo</h1>
                <span>+52-111-11-11</span>
              </div>
            </a>

            <a href="#" class="facebook">
              <div class="icon"><img src="/storage/img/302.jpg" width="53" height="53" id="image"/></div>
              <div class="content">
                <h1>Correo Electr�nico</h1>
                <span>Jenni Toral</span>
              </div>
            </a>

            <a href="#" class="twitter">
              <div class="icon"> <div class="icon"><img src="/storage/img/303.jpg" width="55" height="55" id="image"/></div>
              </div>

              <div class="content">
                <h1>Sitio Web</h1>
                <span>@JenniToral</span>
              </div>
            </a>
          </nav>
        </div>
      </div>
          </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id" value="{{ auth()->user()->Id_Usuario }}">
                <div>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
                  <div>
                      &nbsp;<label id="Nombre_Empresadato" data="Empresa"><p id="Nombre_Empresacampo" data="Nombre">Nombre:</p> </label>
                    </div>
                  </div>
                    <div class="col-md-4 col-sm-6">
                <div id="Nombre_Empresa" class="eff" data="boton01">
               <label id="Nombre_Empresadata" data="{{ $perfilE->Nombre_Empresa }}" class="Empresa">{{ $perfilE->Nombre_Empresa }}</label>
                <input type="button" name="Nombre_Empresa" id="boton01" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Tipo_Empresadato" data="Empresa"><p id="Tipo_Empresacampo" data= "Tipo">Tipo:</p> </label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Tipo_Empresa" class="eff" data="boton02">
                  <label id="Tipo_Empresadata" data="{{ $perfilE->Tipo_Empresa }}" class="Empresa">{{ $perfilE->Tipo_Empresa }}</label>
                <input type="button" name="Tipo_Empresa" id="boton02" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Giro_Empresadato" data="Empresa"><p id="Giro_Empresacampo" data= "Giro">Giro:</p> </label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Giro_Empresa" class="eff" data="boton03">
                  <label id="Giro_Empresadata" data="{{ $perfilE->Giro_Empresa }}" class="Empresa">{{ $perfilE->Giro_Empresa }}</label>
                <input type="button" name="Giro_Empresa" id="boton03" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>


                &nbsp;<label id="Servicio_Empresadato" data="Empresa"> <p id="Servicio_Empresacampo" data= "Servicio(s)">Servicio:</p> </label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Servicio_Empresa" class="eff" data="boton04">
                  <label id="Servicio_Empresadata" data="{{ $perfilE->Servicio_Empresa }}" class="Empresa">{{ $perfilE->Servicio_Empresa }}</label>
                <input type="button" name="Servicio_Empresa" id="boton04" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Producto_Empresadato" data="Empresa"> <p id="Producto_Empresacampo" data= "Producto(s)">Producto:</p> </label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Producto_Empresa" class="eff" data="boton05">
                  <label id="Producto_Empresadata" data="{{ $perfilE->Producto_Empresa }}" class="Empresa">{{ $perfilE->Producto_Empresa }}</label>
                <input type="button" name="Producto_Empresa" id="boton05" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                  &nbsp;<label id="Horario_Atenciondato" data="Empresa"> <p id="Horario_Atencioncampo" data= "Horario de atencion">Horario de Atención:</p> </label>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div id="Horario_Atencion" class="eff" data="boton07">
                <label id="Horario_Atenciondata" data="{{ $perfilE->Horario_Atencion }}" class="Empresa">{{ $perfilE->Horario_Atencion }}</label>
                <input type="button" name="Horario_Atencion" id="boton07" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            @if(auth()->user()->Tipo_Usuario=="Asociado")
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                  &nbsp;<label id="Descripciondato" data="Empresa"> <p id="Descripcioncampo" data= "Descripcion">Descripcion:</p> </label>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div id="Descripcion" class="eff" data="boton007">
                  <input id="Descripcion" type="textarea" value={{ $perfilE->Descripcion }} />
                    <input type="button" name="Descripcion" id="boton007" class="boton01" value="Editar">
                <label id="Descripciondata" data="{{ $perfilE->Descripcion }}" class="Empresa" hidden>{{ $perfilE->Descripcion }}</label>

                </div>
              </div>
            </div>
          @endif
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Cantidad_Productosdato" data="Empresa"><p id="Cantidad_Productoscampo" data= "Cantidad de productos">Cantidad de Productos:</p> </label>
              </div>
            </div>
              <div class="col-md-4 col-sm-6">
                <div id="Cantidad_Productos" class="eff" data="boton08">
                  <label id="Cantidad_Productosdata" data="{{ $perfilE->Cantidad_Productos }}" class="Empresa">{{ $perfilE->Cantidad_Productos }}</label>
                <input type="button" name="Cantidad_Productos" id="boton08" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Telefono_Fijo_Empresadato" data="Empresa"><p id="Telefono_Fijo_Empresacampo" data= "Telefono Fijo">Telefono Fijo:</p> </label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Telefono_Fijo_Empresa" class="eff" data="boton008">
                  <label id="Telefono_Fijo_Empresadata" data="{{ $perfilE->Telefono_Fijo_Empresa }}" class="Empresa">{{ $perfilE->Telefono_Fijo_Empresa }}</label>
                <input type="button" name="Telefono_Fijo_Empresa" id="boton008" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                  &nbsp;<label id="Correo_Electronico_Empresadato" data="Empresa"><p id="Correo_Electronico_Empresacampo" data= "Correo Electronico">Correo Electronico:</p> </label>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div id="Correo_Electronico_Empresa" class="eff" data="boton10">
                <label id="Correo_Electronico_Empresadata" data="{{ $perfilE->Correo_Electronico_Empresa }}" class="Empresa">{{ $perfilE->Correo_Electronico_Empresa }}</label>
                <input type="button" name="Correo_Electronico_Empresa" id="boton10" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Direccion_Empresadato" data="Empresa"> <p id="Direccion_Empresacampo" data= "Direccion">Direccion:</p></label>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="Direccion_Empresa" class="eff" data="boton11">
                  <label id="Direccion_Empresadata" data="{{ $perfilE->Direccion_Empresa }}" class="Empresa">{{ $perfilE->Direccion_Empresa }}</label>
                  <input type="button" name="Direccion_Empresa" id="boton11" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                  &nbsp;<label id="Pag_Web_Empresadato" data="Empresa"><p id="Pag_Web_Empresacampo" data= "Pag Web">Pag Web:</p> </label>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div id="Pag_Web_Empresa" class="eff" data="boton12">
                <label id="Pag_Web_Empresadata" data="{{ $perfilE->Pag_Web_Empresa }}" class="Empresa">{{ $perfilE->Pag_Web_Empresa }}</label>
                <input type="button" name="Pag_Web_Empresa" id="boton12" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Red_Social_Twitter_Empresadato" data="Empresa"><p id="Red_Social_Twitter_Empresacampo" data= "Twitter">Twitter:</p> </label>
              </div>
            </div>
                <div class="col-md-4 col-sm-6">
                <div id="Red_Social_Twitter_Empresa" class="eff" data="boton13">
                  <label id="Red_Social_Twitter_Empresadata" data="{{ $perfilE->Red_Social_Twitter_Empresa }}" class="Empresa">{{ $perfilE->Red_Social_Twitter_Empresa }}</label>
                <input type="button" name="Red_Social_Twitter_Empresa" id="boton13" class="boton01" value="Editar">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px;">
              <div>
                  &nbsp;<label id="Red_Social_Facebook_Empresadato" data="Empresa"><p id="Red_Social_Facebook_Empresacampo" data= "Facebook">Facebook:</p> </label>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div id="Red_Social_Facebook_Empresa" class="eff" data="boton14">
                <label id="Red_Social_Facebook_Empresadata" data="{{ $perfilE->Red_Social_Facebook_Empresa }}" class="Empresa">{{ $perfilE->Red_Social_Facebook_Empresa }}</label> &nbsp;
                <input type="button" name="Red_Social_Facebook_Empresa" id="boton14" class="boton01" value="Editar">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6" style="text-align:left;left:100px">
              <div>
                &nbsp;<label id="Red_Social_Instagramdato" data="Empresa" ><p id="Red_Social_Instagramcampo" data="Instagram">Instagram:</p> </label>
              </div>
            </div>
              <div class="col-md-4 col-sm-6">
                <div id="Red_Social_Instagram" class="eff" data="boton16">
                  <label id="Red_Social_Instagramdata" data="{{ $perfilE->Red_Social_Instagram }}" class="Empresa">{{ $perfilE->Red_Social_Instagram }}</label> &nbsp;
                <input type="button" name="Red_Social_Instagram" id="boton16" class="boton01" value="Editar">
                </div>
              </div>
            </div>

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
    <script src="{{ asset('js/PerfilEm.js')}}" ></script>
    <script src="{{ asset('js/cropE.js')}}" type="text/javascript"></script>
  @endsection
