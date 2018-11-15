@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eventos/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/eventos/css/calendar.css')}}">
<link rel="stylesheet" href="{{ asset('css/eventos/css/btn2.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/eventos/css/bootstrap-datetimepicker.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/eventos/css/AdminLTE.min.css')}}" />

@endsection
@section('content')
    <div class="row">
                      <div class="page-header"><h2></h2></div>

                                  <div class="pull-right form-inline"><br>
                                      <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                                  </div>
                                  <div class="pull-right form-inline"><br>
                                      <button class="btn btn-info" data-toggle='modal' data-target='#events-modal'>Añadir Evento</button>
                                  </div>

              </div>
              <hr>

              <!--ventana modal para el calendario-->
              <div class="modal fade" id="events-modal">
                  <div class="modal-dialog">
                          <div class="modal-content">
                                  <div class="modal-body" style="height: 400px">
                                      <p>One fine body&hellip;</p>
                                  </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              </div>
                          </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

                    <label for="from">Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="fecha_inicio" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>

                    </div>



                    <label for="to">Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>
                    <br />
                    <label for="tipo">Tipo de evento</label>
                    <select class="form-control" name="class" id="tipo">
                        <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                    </select>

                    <br>


                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="titulo" placeholder="Introduce un título">

                    <br>


                    <label for="descripcion">Descripcion Evento</label>
                    <textarea id="descripcion" name="event" required class="form-control" rows="3"></textarea>

                                        <br>
                                        <label for="capacidad">Capacidad de asistencia</label>
                                        <input type="number" id="precioasociado" min="1"  step="1" placeholder="200"   name="event" required class="form-control precio" />
<br />
                                        <div id="as">
                                            <div class="costo" >

                                            <label for="precioasociado">Precio Asociado</label>
                                            <input type="number" id="precioasociado" min="0.00" max="10000.00" step="1" placeholder="$300"   name="event" required class="form-control precio" />
                                        </div>
                                        <div>


                                            <label for="precionoasociado">Precio No Asociado</label>
                                            <input type="number" id="precionoasociado" min="0.00" max="10000.00" step="1" placeholder="$500"   name="event" required class="form-control precio" />
                                        </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <label for="direccion_evento">Direccion del evento</label>
                                        <input type="text" id="direccion_evento"  placeholder="Av telecomunicacion...."   name="event" required class="form-control precio" />
<br />

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12" >

<label for="organizador">Nombre del Organizador</label>
<input type="text" id="organizador"placeholder="Nombre"   name="event" required class="form-control precio" />
</div>
<div class="col-md-4 col-sm-4  col-xs-12">
<label for="correo_electronico_organizador">Correo electronico </label>
<input type="email" id="correo_electronico_organizador"  placeholder="exaple@dominio.com"   name="event" required class="form-control precio" />
</div>

<div class="col-md-4 col-sm-4  col-xs-12">

<label for="telefono_organizador">Telefono de contacto</label>
<input type="text" id="telefono_organizador" min="1"    name="event" required class="form-control precio" />
</div>
</div>
<br />

<label for="ponente">Ponente</label>
<input type="text" id="ponente" placeholder="Nombre"   name="event" required class="form-control precio" />
<br />

<div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Crear evento</h3>
          </div>
          <div class="box-body">
            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
              <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
              <ul class="fc-color-picker" id="color-chooser">
                <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
              </ul>
            </div>

            </div><br/><br/>
            <!-- /input-group -->
          </div>
        </div>


      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/eventos/js/es-ES.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/eventos/js/moment.js')}}"></script>
    <script src="{{ asset('js/eventos/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/eventos/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('js/eventos/js/bootstrap-datetimepicker.es.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('#from').datetimepicker({
            language: 'es',
            minDate: new Date()
        });
        $('#to').datetimepicker({
            language: 'es',
            minDate: new Date()
        });

    });
</script>
<script type="text/javascript">

</script>
@endsection
