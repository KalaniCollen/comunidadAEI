<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_Usuario;
use App\Perfil_Empresa;
use App\User;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PerfilRequest;
use App\Http\Requests\CorreoRequest;
use App\Http\Requests\passwordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Hash;
class PerfilUsuarioController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function Index($slug_empresa)
   {
      $perfil = Perfil_Usuario::where('id_usuario',Auth::id())->first();
     $perfilE = Perfil_Empresa::where('id_usuario',Auth::id())->first();
      $User = User::where('id_usuario',Auth::id())->first();
       return view('Perfiles.Perfil.perfil',[
         'perfil'=>$perfil,
         'perfilE'=> $perfilE,
         'user' => $User
       ]);
   }
   public function show($slug_empresa)
   {
       $perfil = Perfil_Usuario::where('id_usuario',Auth::id())->first();
      $perfilE = Perfil_Empresa::where('id_usuario',Auth::id())->first();
       $User = User::where('id_usuario',Auth::id())->first();
        return view('Perfiles.Perfil.EditarPerfil',[
          'perfil'=>$perfil,
          'perfilE'=> $perfilE,
          'user' => $User
        ]);
       return view('form.campo')->with('dato', $request);
   }
// 'email' => ['required', 'email', Rule::unique('users')->ignore($user->id, 'user_id')]
  public function store(Request $request)
  {


  }

  public function correo(CorreoRequest $request)
  {
// dd($request->email);
      $correo=User::where('id_usuario',Auth::id())->first();
      // $correo->fill($request)->ignore(Auth::id(),'id_usuario');
$correo->email=$request->email;
$correo->save();
// dd($correo);
       Auth::logout();
      return redirect("/");
  }
  public function password(passwordRequest $request)
  {
// dd($request->email);
      $password=User::where('id_usuario',Auth::id())->first();
      // $correo->fill($request)->ignore(Auth::id(),'id_usuario');
      // dd($request->mypassword);
      if(Hash::check($request->mypassword,$password->password))
      {

          $password->password=bcrypt($request->password);
          $password->save();
          // dd($correo);
                 Auth::logout();
                return redirect("/");
      }
      $errors=["mypassword"=>"La contraseña  es incorrecta"];
      return redirect('/cambiarpassword')->withErrors($errors);

  }
  public function update(Request $request)
  {

      $User=User::where('id_usuario',Auth::id())->first();
      $User->names=Str::upper($request->name);
      $User->apellido_paterno=Str::upper($request->apellido_materno);
      $User->apellido_materno=Str::upper($request->apellido_materno);
      $slug=str::slug($request->name.' '.$request->apellido_paterno.' '.$request->apellido_materno.' '.Auth::id());
      $User->slug_empresa=$slug;
      $Perfil=Perfil_Usuario::where('id_usuario', Auth::id())->first();
      $Perfil->sexo=$request->sexo;
      $Perfil->telefono_movil=$request->telefono_movil;
      $Perfil->fecha_nacimiento=$request->fecha_nacimiento;
      $Perfil->slug_usuario=$slug;
      $Perfil->save();
      return redirect('Cuenta/'.$slug);
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
