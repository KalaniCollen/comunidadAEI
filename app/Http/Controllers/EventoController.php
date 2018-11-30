<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Evento;
use ComunidadAEI\Registro_Evento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    private $listaColores = [
        'exposicion' => 'Exposición', 'convencion' => 'Convención', 'conferencia' => 'Conferencia', 'congreso' => 'Congreso', 'capacitacion' => 'Capacitación', 'comida' => 'Comida',
        'juntas' => '#556677',
        'event-success' => '#009688',
        'comidas' => '#FF9800',
        'event-important' => '#E91E63',
    ];

    public function index(Response $response){
        $eventos = Evento::where('estado_evento', 1)->get();
        $data = [];
        $eventosList = [];
        foreach ($eventos as $evento) {
            $data['id'] = $evento->id_evento;
            $data['title'] = $evento->nombre_evento;
            $data['start'] = $evento->fecha_inicio;
            $data['end'] = $evento->fecha_final;
            $data['url'] = "/evento/$evento->slug_evento";
            // $data['color'] = $this->listaColores[$evento->tipo];
            array_push($eventosList, $data);
        }
        return response()->json($eventosList, Response::HTTP_OK);
    }

    public function create(Request $request){
        return view('eventos.create');
    }

    public function store(Request $request) {
        $evento = new Evento();
        $evento->fill($request->except('slug_evento', 'fecha_inicio', 'fecha_final', 'id_usuario'));
        $evento->fecha_inicio = \Date::parse($request->fecha_inicio)->format('Y-m-d H:m:s');
        $evento->fecha_final = \Date::parse($request->fecha_final)->format('Y-m-d H:m:s');
        $evento->slug_evento = str_slug($request->nombre_evento);
        $evento->id_usuario = auth()->user()->id_usuario;
        $evento->save();
        return redirect()->back()->with('info', '¡Solicitud enviada correctamente!');
    }

    public function select()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Evento::where('estado_evento','1')->pluck('id_evento'); //listamos todos los id de los eventos
        $titulo = Evento::where('estado_evento','1')->pluck('nombre_evento'); //lo mismo para lugar y fecha
        $fechaIni = Evento::where('estado_evento','1')->pluck('fecha_inicio');
        $fechaFin = Evento::where('estado_evento','1')->pluck('fecha_final');

        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }

        json_encode($data); //convertimos el array principal $data a un objeto Json
        return $data; //para luego retornarlo y estar listo para consumirlo
    }
    public function show(Evento $evento){
        $lugares = Registro_Evento::where('id_evento',$evento->id_evento)->get();
        $lugaresdispo = $evento->num_invitados - count($lugares);
        if($lugaresdispo < 0){
            $lugaresdispo = 0;
        }
        $asistencia = Registro_Evento::where('id_usuario',Auth::id())->where('id_evento',$evento->id_evento)->first();
        return view('eventos.detalles')->with(['evento'=> $evento, 'lugares'=>$lugaresdispo , 'asistencia'=>$asistencia]);
    }

    public function showCalendar() {
        return view('eventos.calendario');
    }
}
