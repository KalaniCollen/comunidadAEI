@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eventos/css/fullcalendar.min.css') }}" />
@endsection
@section('content')
    <section class="section">
        <h1 class="section__title">Eventos</h1>

        <div class="row">
            <div class="col-md-3 col-lg-3">
                @foreach ($eventos as $evento)
                    <a href="{{ route('evento.show', $evento->slug_evento) }}" class="card card--mini">
                        <p class="card__title">{{ $evento->nombre_evento }}</p>
                        <p class="card__date">{{ $evento->fecha_inicio }}</p>
                    </a>
                @endforeach
            </div>
            <div class="col-md-9 col-lg-9">
                <div id="calendar"></div>
            </div>
        </div>
    </section>

    	{{-- <div class="panel panel-default">
        <div class="panel-body">
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="box box-solid">

                <div class="col-md-3">
                    <h4 class="box-title">Lista de ventos</h4>
                    <br />
                    <div>

                    @foreach ($eventos as $evento)
                        <h5>{{ Carbon\Carbon::parse($evento->fecha_inicio)->format('d M Y') }}</h5>
                        Nombre:
                        {{ $evento->nombre_evento }}
                        <br />
                        Hora:
                            <br />
                    <a href="{{ url('evento', ['slug' => $evento->slug_evento])}}">ver detalles</a>
                    @endforeach

                </div>
                </div>

            	<div class="col-md-9">
              		<div class="box box-primary">
                		<div class="box-body no-padding">
                  		<!-- THE CALENDAR -->
                  			<div id="calendar"></div>
                		</div>
              		</div>
            	</div>

            <!-- /.col -->
          	  </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
       </div><!-- /.panel-body -->
      </div><!-- /.panel -->
    </div>
    </div>
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
    </div><!-- /.modal --> --}}
    @endsection
    @section('scripts')
      <script>
      $(function () {
        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }

        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();
      //while(reload==false){
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'hoy',
            month: 'mes',
            week: 'semana',
            day: 'dia'
          },

          events: { url:"cargaEventos"},
          modal: '#events-modal',

          eventMouseover: function( event, jsEvent, view ) {
            var start = (event.start.format("HH:mm"));
            var back=event.backgroundColor;
            if(event.end){
                var end = event.end.format("HH:mm");
            }else{var end="No definido";
            }
            if(event.allDay){
                var allDay = "Si";
            }else{var allDay="No";
            }
            var tooltip = '<div class="tooltipevent" style="width:200px;height:100px;color:white;background:'+back+';position:absolute;z-index:10001;">'+'<center>'+ event.title +'</center>'+'Todo el dia: '+allDay+'<br>'+ 'Inicio: '+start+'<br>'+ 'Fin: '+ end +'</div>';
            $("body").append(tooltip);
            $(this).mouseover(function(e) {
                    $('#events-modal').show();
              $(this).css('z-index', 10000);
              $('.tooltipevent').fadeIn('500');
              $('.tooltipevent').fadeTo('10', 1.9);
            }).mousemove(function(e) {
              $('.tooltipevent').css('top', e.pageY + 10);
              $('.tooltipevent').css('left', e.pageX + 20);
            });
          },

          eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.tooltipevent').remove();
          },

          dayClick: function(date, jsEvent, view) {
                if (view.name === "month") {
                    $('#calendar').fullCalendar('gotoDate', date);
                    $('#calendar').fullCalendar('changeView', 'agendaDay');
                }
          }
        });
      });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('js/eventos/js/fullcalendar.min.js')}}"></script>
@endsection
