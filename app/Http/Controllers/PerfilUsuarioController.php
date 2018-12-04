<?php

namespace ComunidadAEI\Http\Controllers;

use ComunidadAEI\Traits\UploadImage;
use ComunidadAEI\Perfil_Usuario;
use ComunidadAEI\Perfil_Empresa;
use ComunidadAEI\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use ComunidadAEI\Http\Requests\PerfilRequest;
use ComunidadAEI\Http\Requests\CorreoRequest;
use ComunidadAEI\Http\Requests\CuentaRequest;
use ComunidadAEI\Http\Requests\passwordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Hash;
class PerfilUsuarioController extends Controller
{
    use UploadImage;

    private $view = "perfiles.usuario";
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $perfil = Perfil_Usuario::where('id_usuario',Auth::id())->first();
        $perfilE = Perfil_Empresa::where('id_usuario',Auth::id())->first();
        $User = User::where('id_usuario',Auth::id())->first();
        return view("{$this->view}.index",[
            'perfil'=>$perfil,
            'perfilE'=> $perfilE,
            'user' => $User
        ]);
    }

    public function edit(Perfil_Usuario $perfil_usuario)
    {
        $this->authorize('view', $perfil_usuario);
        return view('perfiles.usuario.edit', compact('perfil_usuario'));
    }

    public function store(Request $request)
    {


    }

    public function correo(CorreoRequest $request)
    {
        $correo=User::where('id_usuario',Auth::id())->first();
        $correo->email=$request->email;
        $correo->save();
        Auth::logout();
        return redirect("/");
    }


    public function password(passwordRequest $request)
    {
        $password=User::where('id_usuario',Auth::id())->first();
        if(Hash::check($request->mypassword,$password->password))
        {
            $password->password=bcrypt($request->password);
            $password->save();
            Auth::logout();
            return redirect("/");
        }
        $errors=["mypassword"=>"La contraseña  es incorrecta"];
        return redirect('/cambiarpassword')->withErrors($errors);
    }

    public function update(PerfilRequest $request, $slug_usuario)
    {
        $perfil_usuario = Perfil_Usuario::where('slug_usuario', $slug_usuario)->first();
        $this->authorize('update', $perfil_usuario);
        $user = auth()->user();

        $user->name = strtoupper($request->name);
        $user->apellido_paterno = strtoupper($request->apellido_paterno);
        $user->apellido_materno = strtoupper($request->apellido_materno);
        $user->notificacion_correo = isset($request->notificacion_correo) ? 1 : 0;

        $perfil_usuario->slug_usuario = str_slug("{$request->name} {$request->apellido_paterno} {$request->apellido_materno} {$user->id_usuario}");
        $perfil_usuario->red_social = $request->red_social;
        $perfil_usuario->telefono_movil = $request->telefono_movil;
        $perfil_usuario->sexo = $request->sexo;
        $perfil_usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $perfil_usuario->privacidad = isset($request->privacidad) ? 1 : 0;
        $perfil_usuario->save();
        $user->save();
        return redirect()->route("perfil-usuario.index");
    }

    public function updateEmail() {
        if(Auth::check()){
            return view('perfiles.Perfil.Correo');
        }
        return redirect('/');
    }

    public function mostrar(Request $request)
    {
        if ($request->ajax())
        {
            $id=Auth::id();
            if($request->tabla=="perfil"){

                $perfil = Perfil_Usuario::FindOrFail($id);
                if($request->name=="imagen"){
                    Storage::delete(str_replace("/storage", "public", $perfil->imagen));
                    $perfil->imagen=$request->dato;
                    $result = $perfil->save();
                }
                if($request->name=="privacidad"){
                    $perfil->privacidad=$request->dato;
                    $result = $perfil->save();
                }
            }

            if ($result){
                return response()->json(['success'=>'true']);
            }
        }

    }

    public function saveImage(PerfilRequest $request, Perfil_Usuario $perfil_usuario) {
        $oldImage = ltrim($perfil_usuario->imagen, '/storage');
        $oldImage = "/public/{$oldImage}";
        Storage::delete($oldImage);
        if ($request->ajax()) {
            $data = $request->imagen;
            $perfil_usuario->imagen = '/' . $this->getImagePNG('storage/imagen_usuario/', $data);
            $perfil_usuario->save();
            return response()->json("¡Imagen de perfil actualizada correctamente!", Response::HTTP_OK);
        }
    }


}
