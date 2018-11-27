<?php

namespace ComunidadAEI\Http\Controllers;

use Illuminate\Http\Request;
use ComunidadAEI\Perfil_Usuario;
use ComunidadAEI\Perfil_Empresa;
use ComunidadAEI\User;
use Illuminate\Support\Str as Str;
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

    public function edit(PerfilRequest $request) {
        $perfil = Perfil_Usuario::where('id_usuario', Auth::id())->first();
        $perfilE = Perfil_Empresa::where('id_usuario', Auth::id())->first();
        $User = User::where('id_usuario', Auth::id())->first();
        return view("{$this->view}.edit",[
            'perfil'=>$perfil,
            'perfilE'=> $perfilE,
            'user' => $User
        ]);
        // return view('form.campo')->with('dato', $request);
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

    public function update(PerfilRequest $request, Perfil_Usuario $usuario)
    {

        $usuario->fill($request->except('slug_usuario'));
        $usuario->save();
    //     $User=User::where('id_usuario',Auth::id())->first();
    //     $User->names=Str::upper($request->name);
    //     $User->apellido_paterno=Str::upper($request->apellido_materno);
    //     $User->apellido_materno=Str::upper($request->apellido_materno);
    //     $slug=str::slug($request->name.' '.$request->apellido_paterno.' '.$request->apellido_materno.' '.Auth::id());
    //     $User->slug_empresa=$slug;
    //     $Perfil=Perfil_Usuario::where('id_usuario', Auth::id())->first();
    //     $Perfil->sexo=$request->sexo;
    //     $Perfil->telefono_movil=$request->telefono_movil;
    //     $Perfil->fecha_nacimiento=$request->fecha_nacimiento;
    //     $Perfil->slug_usuario=$slug;
    //     $Perfil->save();
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
            //else
            //{
            //return response()->json(['success'=>'false']);
            //}
        }

    }



}
