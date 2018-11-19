<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use App\Evento;
use App\Registro_Evento;

class EventoController extends Controller
{
    //
    public function index(){

    return view('eventos.index');
    }

    public function create(Request $request){
// dd($request);
                $Evento=Evento::create([
                  'nombre_evento'=>$request->title,
                  'descripcion_evento'=>$request->descipcion,
                  'fecha_inicio'=>$request->form,
                  'fecha_final'=>$request->to,
                  'tipo'=>$request->tipo,
                  'direccion_evento'=>$request->direccion_evento,
                  'num_invitados'=>$request->capacidad,
                  'costo_asociado'=>$request->precioasociado,
                  'costo_no_asociado'=>$request->precionoasociado,
                  'ponente'=>$request->ponente,
                  'organizador'=>$request->organizador,
                  'correo_electronico_organizador'=>$request->correo_electronico_organizador,
                  'telefono_organizador'=>$request->telefono_organizador,
                  // 'color'
                  'slug_evento'=>Str::slug($request->title.' '.Auth::id()),
                  'id_usuario'=>Auth::id(),
              ]);
    return view('eventos.index');
    }
    public function store(){
        $date =new \Carbon\Carbon(time());

        $eventos=Evento::where('fecha_inicio','<=',$date)->take(10)->get();

        return view('eventos.calendario')->with('eventos',$eventos);

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
public function show($slug){
    $evento=Evento::where('slug_evento',$slug)->first();
    $lugares=Registro_Evento::where('id_evento',$evento->id_evento)->get();
    $lugaresdispo=$evento->num_invitados-count($lugares);
    if($lugaresdispo<0){
        $lugaresdispo=0;
    }
    $asistencia=Registro_Evento::where('id_usuario',Auth::id())->where('id_evento',$evento->id_evento)->first();

    return view('eventos.detalles')->with(['evento'=> $evento, 'lugares'=>$lugaresdispo , 'asistencia'=>$asistencia]);
}
}
