<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_Empresa;
use App\Perfil_Usuario;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PerfilEmpresaController extends Controller
{

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function Index($slug_empresa)
  {
     $PerfilEmpresa = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
     $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
      return view('Perfiles.EditarPerfilEmpresa')->with([
        'perfilE'=>$PerfilEmpresa,
        'perfil'=>$Perfil]);
  }
  public function update(Request $request)
  {
     $PerfilEmpresa = Perfil_Empresa::where('id_usuario',Auth::id())->first();
// $PerfilEmpresa=$request;
$PerfilEmpresa->nombre_empresa=Str::upper($request->nombre_empresa);
$PerfilEmpresa->tipo_empresa=Str::upper($request->tipo_empresa);
$PerfilEmpresa->tipo_empresa=Str::upper($request->tipo_empresa);
$PerfilEmpresa->giro_empresa=Str::upper($request->giro_empresa);
$PerfilEmpresa->servicio_empresa=Str::upper($request->servicio_empresa);
$PerfilEmpresa->producto_empresa=Str::upper($request->producto_empresa);
$PerfilEmpresa->telefono_fijo_empresa=$request->telefono_fijo_empresa;
$PerfilEmpresa->horario_atencion=Str::upper($request->horario_atencion);
$PerfilEmpresa->correo_electronico_empresa=$request->correo_electronico_empresa;
$PerfilEmpresa->direccion_empresa=$request->direccion_empresa;

$PerfilEmpresa->slug_empresa = Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
$perfilU =User::where('id_usuario',Auth::id())->first();
if($perfilU->tipo_usuario=="Asociado"){
$PerfilEmpresa->descripcion=Str::upper($request->descripcion);
}
$perfilU->slug_empresa=Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
$perfilU->save();





$PerfilEmpresa->save();
     $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
      return redirect('PerfilEmpresa/'.$PerfilEmpresa->slug_empresa);
  }
  public function Show($slug_empresa)
  {
     $PerfilEmpresa = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
     $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
      return view('Perfiles.PerfilEmpresa')->with([
        'perfilE'=>$PerfilEmpresa,
        'perfil'=>$Perfil]);
  }

  public function store(Request $request)
  {if($request->name=="tipo_empresa"){
    return view('form.TipoE')->with('dato', $request);
}
if($request->name=="giro_empresa"){
  return view('form.Giro')->with('dato', $request);
}
if($request->name=="Telefono_Movil_Empresa" or $request->name=="telefono_fijo_empresa" or $request->name=="cantidad_productos" or $request->name=="Red_Social_Whatsapp"){
  $request['tipo']='number';
}
else{
  $request['tipo']='text';
}
      return view('form.campo')->with('dato', $request);
  }



  public function edit(Request $request,$id)
  {
    if ($request->ajax())
      {
        $dato=$request->only('name');
        if($request->name=='correo_electronico_empresa' or $request->name=='red_social_instagram' or $request->name=='red_social_twitter_empresa' or
        $request->name=='Red_Social_Facebook_Empresa' or $request->name=='pag_web_empresa' ){
        $datos[$dato['name']] =$request->dato;
        }
        else{
      $datos[$dato['name']] =Str::upper($request->dato);


        }

$perfilE =Perfil_Empresa::where('id_usuario',$id)->first();
          // $perfilE = Perfil_Empresa::FindOrFail($id);
          if($request->name=="imagen"){
            Storage::delete(str_replace("/storage", "public", $perfilE->logo_empresa));

            $perfilE->logo_empresa=$request->dato;
            $perfilE->save();
          }
          if($request->name=="nombre_empresa"){
            $perfilE->nombre_empresa=Str::upper($request->dato);
            $perfilE->slug_empresa = Str::slug($request->dato.' '.$id);
            $perfilU =User::where('id_usuario',$id)->first();
            $perfilU->slug_empresa=Str::slug($request->dato.' '.$id);

            $perfilU->save();
            $perfilE->save();
              return response()->json($perfilU->slug_empresa);
          }
          $result = $perfilE->fill($datos)->save();
          $request->dato=$perfilE[$dato['name']];

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

}
