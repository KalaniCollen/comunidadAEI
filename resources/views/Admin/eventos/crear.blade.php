@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/eventos/css/calendar.css')}}">
<link rel="stylesheet" href="{{ asset('css/eventos/css/btn2.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/eventos/css/bootstrap-datetimepicker.min.css')}}" />


@endsection
@section('content')
    <div class="panel panel-default">
    <div class="panel-heading"> <h2>&nbsp;&nbsp;&nbsp;Información de eventos del sistema</h2></div>
    <div class="panel-body">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>

        <form  method="POST" action="{{ route('crear_evento') }}">
                {{ csrf_field() }}
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
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                    </select>
                    <br>
                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="titulo" placeholder="Introduce un título" required>
                    <br>
                    <label for="descripcion">Descripcion Evento</label>
                    <textarea id="descripcion" name="descipcion" required class="form-control" rows="3"></textarea>
                    <br>
                    <label for="capacidad">Capacidad de asistencia</label>
                    <input type="number" id="capacidad" min="1"  step="1" placeholder="200"   name="capacidad" required class="form-control precio" />
                    <br />
                    <div id="as">
                        <div class="costo" >
                            <label for="precioasociado">Precio Asociado</label>
                            <input type="number" id="precioasociado" min="0.00" max="10000.00" step="1" placeholder="$300"   name="precioasociado" required class="form-control precio" />
                        </div>
                        <div>
                        <label for="precionoasociado">Precio No Asociado</label>
                        <input type="number" id="precionoasociado" min="0.00" max="10000.00" step="1" placeholder="$500"   name="precionoasociado" required class="form-control precio" />
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <label for="direccion_evento">Direccion del evento</label>
                    <input type="text" id="direccion_evento"  placeholder="Av telecomunicacion...."   name="direccion_evento" required class="form-control precio" />
                    <br />

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12" >
                            <label for="organizador">Nombre del Organizador</label>
                            <input type="text" id="organizador"placeholder="Nombre"   name="organizador" required class="form-control precio" required/>
                        </div>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <label for="correo_electronico_organizador">Correo electronico </label>
                            <input type="email" id="correo_electronico_organizador"  placeholder="exaple@dominio.com"   name="correo_electronico_organizador" required class="form-control precio" />
                        </div>
                        <div class="col-md-4 col-sm-4  col-xs-12">
                            <label for="telefono_organizador">Telefono de contacto</label>
                            <input type="text" id="telefono_organizador" min="1"    name="telefono_organizador" required class="form-control precio" />
                        </div>
                    </div>
                    <br />
                    <label for="ponente">Ponente</label>
                    <input type="text" id="ponente" placeholder="Nombre"   name="ponente" required class="form-control precio" />
                    <br />
                     <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Crear evento</button>
    </div>
                    </form>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/eventos/js/es-ES.js')}}"></script>
    {{-- <script src="{{ asset('js/jquery.min.js')}}"></script> --}}
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
@endsection
