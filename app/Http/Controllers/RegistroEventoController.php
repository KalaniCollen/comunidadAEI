<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro_Evento;
use App\Registro_Invitado_Evento;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InvitadoRequest;

class RegistroEventoController extends Controller
{
    public function create($id){
        $Evento=Registro_Evento::create([
          'id_usuario'=>Auth::id(),
          'id_evento'=>$id,
      ]);
      return redirect('/calendario');
    }
    public function destroy($id){
        $evento=Registro_Evento::where('id_usuario',Auth::id())->where('id_evento',$id)->first();
        $evento->delete();
      return redirect('/calendario');
    }
    public function invitar(InvitadoRequest $request,$id){
        $Evento=Registro_Invitado_Evento::create([
          'nombre_invitado'=>$request->nombre_invitado,
          'apellido_invitado'=>$request->apellido_invitado,
          'correo_invitado'=>$request->correo_electronico_invitado,
          'edad_invitado'=>$request->edad_invitado,
          'sexo_invitado'=>$request->sexo_invitado,
          'id_usuario'=>Auth::id(),
          'id_evento'=>$id,
      ]);
      return redirect('/calendario');
    }
}
