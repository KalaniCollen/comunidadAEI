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
class PerfilUsuarioController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
     if($request->name=="sexo"){
       return view('form.sexo')->with('dato', $request);
     }

     if($request->name=="telefono_movil"){
       $request['tipo']='number';
     }
     else{
       $request['tipo']='text';
     }
      return view('form.campo')->with('dato', $request);
  }

  public function mostrar(Request $request,$id)
  {
    if ($request->ajax())
      {
        $dato=$request->only('name');
            if($request->name=='name' or $request->name=='apellido_materno' or $request->name=='apellido_paterno'){
                $datos[$dato['name']] =Str::upper(Input::get('dato'));
                  $request['dato'] =Str::upper(Input::get('dato'));
            }
            else{
        $datos[$dato['name']] =$request->dato;
        }
        if($request->tabla=="perfil"){

          $perfil = Perfil_Usuario::FindOrFail($id);
          if($request->name=="imagen"){
            Storage::delete(str_replace("/storage", "public", $perfil->imagen));
            $perfil->imagen=$request->dato;
            $perfil->save();
          }
          if($request->name=="privacidad"){
            $perfil->privacidad=$request->dato;
            $perfil->save();
          }

          $result = $perfil->fill($datos)->save();

        }
        else{
          $user = User::FindOrFail($id);

          $result = $user->fill($datos)->save();
            $user = User::FindOrFail($id);
          if($request->name=="name" or  $request->name=="apellido_materno" or $request->name=="apellido_paterno"){
            $user->slug_usuario=Str::slug($user->name.' '.$user->apellido_paterno.' '.$user->apellido_materno.' '.$id);
            $user->save();
            $perfilee=Perfil_Usuario::where('id_usuario',$id)->first();

            $perfilee->slug_usuario=$user->slug_usuario;
            $perfilee->save();
            return response()->json($user->slug_usuario);
          }
}
          if ($result){

            $request['mensaje']="El dato ha sido actualizado";
              return view('form.dato')->with('dato', $request);
          }
          //else
          //{
            //return response()->json(['success'=>'false']);
          //}
      }

  }

  public function show($slug)
  {
     $perfil = Perfil_Usuario::where('slug_usuario',$slug)->first();
    $perfilE = Perfil_Empresa::where('id_usuario',$perfil->id_usuario)->first();
     $User = User::where('id_usuario',$perfil->id_usuario)->first();
//       $perfil=Perfil_Usuario::find($id_usuario)->first();
  //    dd($perfil->Telefono_Fijo);
      //$perfil=Perfil_Usuario::all()->first();

      return view('Perfiles.perfil',[
        'perfil'=>$perfil,
        'perfilE'=> $perfilE,
        'user' => $User
      ]);
  }
}
