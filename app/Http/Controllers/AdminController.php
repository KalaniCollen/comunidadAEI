<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Perfil_Empresa;
use App\Evento;
use App\Servicios;
use App\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Perfil_Usuario;
use Illuminate\Support\Str as Str;
use Carbon\Carbon;



class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('Admin');
    }
    //
    public function index(){


    $numUsuarios=count(User::get());
    $numasociados=count(User::where('tipo_usuario','=','asociado')->get());
    $numnoasociado=count(User::where('tipo_usuario','=','no asociado')->get());
    $numempresa=count(Perfil_Empresa::get());
    $numeventos=count(Evento::get());




    			return view('Admin.Index', compact('numUsuarios','numasociados','numnoasociado','numempresa','numeventos'));

        $Admin = User::where('id_usuario', Auth::id())->first();
        return view('Admin.Index')->with('Admin', $Admin);
    }
    public function lista_usuarios(){
        $usuarios= User::get();

        //return $usuarios;
        return view('admin.usuarios.lista_usuarios')->with("usuarios", $usuarios );
	}
    public function lista_usuariosaso(){
        $usuarios= User::where('tipo_usuario','asociado')->get();

        //return $usuarios;
        return view('admin.usuarios.lista_usuarios')->with("usuarios", $usuarios );
    }
    public function lista_usuariosnoa(){
        $usuarios= User::where('tipo_usuario','no asociado')->get();

        //return $usuarios;
        return view('admin.usuarios.lista_usuarios')->with("usuarios", $usuarios );
    }
    public function lista_empresas(){
        $empresas= Perfil_Empresa::get();

        //return $usuarios;
        return view('admin.empresas.lista_empresas')->with("empresas", $empresas );
	}
    public function form_editar_usuario($id){
    //funcion para cargar los datos de cada usuario en la ficha
    $usuario=User::find($id);
    $contador=count($usuario);
    if($contador>0){
        return view("Admin.usuarios.form_editar_usuario")->with("usuario",$usuario);
    }
    else{
        return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");
    }
    }
    public function actualizar_usuario(Request $request){

		$data=$request->all();
		$idUsuario=$data["id"];
		$usuario=User::find($idUsuario);
		$usuario->tipo_usuario= $data["type"];
		$usuario->name= $data["name"];
		$usuario->apellido_paterno=$data["last_name"];
        $usuario->apellido_materno=$data["last_names"];
		//$usuario->rol=$data["rol"];
        $usuario->slug_usuario=Str::slug( $data["name"]." ".$data["last_name"]." ".$data["last_names"]." ".$idUsuario);


		$resul= $usuario->save();

		if($resul){
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");
		}
		else{
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
		}
	}
    public function cambiar_password(Request $request){

    $id=$request->input("id_usuario_password");
    $password=$request->input("password_usuario");
    $usuario=User::find($id);
    $usuario->password=bcrypt($password);
    $r=$usuario->save();

    if($r){
       return view("mensajes.msj_correcto")->with("msj","password actualizado");
    }
    else{
        return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
    }
}
public function form_nuevo_usuario(){
		return view('admin.usuarios.form_nuevo_usuario');
	}
    public function agregar_nuevo_usuario(Request $request)	{

    DB::transaction(function()
{
$code=str_random(25);
$email=Input::get('email');
$nombre=Input::get('name');

    $user=User::create([
      'name' => Str::upper($nombre),
      'apellido_paterno'=> Str::upper(Input::get('apellido_paterno')),
      'apellido_materno'=> Str::upper(Input::get('apellido_materno')),
        'email' => Input::get('email'),
        'password' => bcrypt(Input::get('password')),
        'confirmation_code'=>$code,
        'status'=>'1',
                'tipo_usuario'=>Input::get('type'),
        'notificacion_correo' => Input::get('Notificacion'),
    ]);
    $useru=User::where('id_usuario',$user->id_usuario)->first();
    $useru->slug_usuario=Str::slug( Str::upper($nombre).' '.Str::upper(Input::get('apellido_paterno')).
     ' '.Str::upper(Input::get('apellido_materno')).' '.$user->id_usuario);
     $useru->slug_empresa=Str::slug( Str::upper($nombre).' '.Str::upper(Input::get('apellido_paterno')).
      ' '.Str::upper(Input::get('apellido_materno')).' '.$user->id_usuario);
      $useru->save();
    $mensaje='El punto de partida de todo logro es el deseo...';
    Perfil_Usuario::create([
          'fecha_nacimiento'=> time(),
          'id_usuario'=>$user->id_usuario,
          'sexo'=> "M",
          'slug_usuario'=> $useru->slug_usuario,

    ]);

    Perfil_Empresa::create([
        'id_usuario'=>$user->id_usuario,
        'mis_logros'=>$mensaje,
        'slug_empresa'=> $useru->slug_empresa,
    ]);
    $resul= $useru->save();

		if($resul){
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");
		}
		else{
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");
		}
  });
}
public function nuevo_evento(){
    return view('Admin.eventos.crear');
}
public function crear_evento(Request $request){
    // dd($request);
$fecha_inicio=new Carbon(str_replace('/','-',$request->from));
$fecha_inicio->format('Y-m-d H:i:s');
$fecha_final=new Carbon(str_replace('/','-',$request->to));
$fecha_final->format('Y-m-d H:i:s');

            $Evento=Evento::create([
              'nombre_evento'=>$request->title,
              'descripcion_evento'=>$request->descipcion,
              'fecha_inicio'=> $fecha_inicio,
              'fecha_final'=>$fecha_final,
              'tipo'=>$request->tipo,
              'estado_evento'=>"1",
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
return redirect()->route('lista_evento');
}
public function deleteUser($id){
     DB::statement('SET FOREIGN_KEY_CHECKS=0');
    $eventos=Evento::where('id_usuario',$id)->get();
    $productos=Productos::where('id_empresa',$id)->get();
    $servicios=Servicios::where('id_empresa',$id)->get();
    $pe=Perfil_Empresa::where('id_usuario',$id)->first();
    $use=User::where('id_usuario',$id)->first();
    $p=Perfil_Usuario::where('id_usuario',$id)->first();
    foreach ($eventos as $key => $evento) {
            $evento->delete();
    }
foreach ($productos as $key => $producto) {
    $producto->delete();
}
    foreach ($servicios as $key => $servicio) {
    $servicio->delete();
    }

    $pe->delete();
    $use->delete();
    $p->delete();



 DB::statement('SET FOREIGN_KEY_CHECKS=1');


    User::destroy($id);

    return view("mensajes.msj_correcto")->with("msj"," El usuario ha sido eliminado");
}

public function lista_evento(){
    $date =Carbon::now();
    $eventos=Evento::whereMonth('fecha_inicio','>=',$date->format('m'))->whereDay('fecha_inicio','>=',$date->format('d'))->orderBy('fecha_inicio', 'asc')->get();

return view('Admin.eventos.lista_eventos')->with('eventos',$eventos);
}

public function eliminar_evento($id){
     DB::statement('SET FOREIGN_KEY_CHECKS=0');
    Evento::destroy($id);
     DB::statement('SET FOREIGN_KEY_CHECKS=1');
    return redirect()->route('lista_evento');
}
public function verificar_evento($id){

    $evento= Evento::where('id_evento',$id)->first();
    $evento->estado_evento="1";
    $evento->save();

    return redirect()->route('lista_evento');
}
}
