@extends('layouts.head')
@section('content')
    <section class="section">
        <h1 class="section__title">Eventos</h1>

        <div class="row">
            <div class="col-md-4 col-lg-4">
                @foreach ($eventos as $evento)
                    <a href="{{ route('evento.show', $evento->slug_evento) }}" class="card card--mini">
                        <p class="card__title">{{ $evento->nombre_evento }}</p>
                        <p class="card__date">{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d M Y') }}</p>
                        <p class="card__time">{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($evento->fecha_final)->format('H:i') }} hrs.</p>
                        <span class="card__decoration"></span>
                    </a>
                @endforeach
            </div>

            <div class="col-md-8 col-lg-8">
                <div id="calendar"></div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
    $(function () {
        // $('#calendar').fullCalendar({
        //     header: {
        //         center: 'month, agendaWeek'
        //     },
        //     events: {
        //         url: '/evento',
        //         type: 'GET',
        //         data: {
        //             titulo: ''
        //         },
        //         color: 'orange'
        //     }
        // });
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

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            buttonText: {
                today: 'hoy',
                month: 'mes',
                week: 'semana',
                day: 'dia',
                list: 'lista'
            },

            events: {
                url:"evento"
            },
            modal: '#events-modal',
            timeFormat: 'H:mm',

            eventMouseover: function( event, jsEvent, view ) {
                var start = (event.start.format("HH:mm"));
                var back=event.backgroundColor;
                if(event.end){
                    var end = event.end.format("HH:mm");
                }else{var end="No definido";
            }
            if(event.allDay) {
                var allDay = "Si";
            } else {
                var allDay="No";
            }
        // var tooltip = '<div class="tooltipevent" style="width:200px;height:100px;color:white;background:'+back+';position:absolute;z-index:10001;">'+'<center>'+ event.title +'</center>'+'Todo el dia: '+allDay+'<br>'+ 'Inicio: '+start+'<br>'+ 'Fin: '+ end +'</div>';

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
@endsection
