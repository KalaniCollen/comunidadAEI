<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_Empresa;
use App\Perfil_Usuario;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Http\Requests\Perfilrequest;
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
       return view('Perfiles.Empresa.PerfilEmpresa')->with([
         'perfilE'=>$PerfilEmpresa,
         'perfil'=>$Perfil]);
   }
  public function show($slug_empresa)
  {
     $PerfilEmpresa = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
     $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
      return view('Perfiles.Empresa.EditarPerfilEmpresa')->with([
        'perfilE'=>$PerfilEmpresa,
        'perfil'=>$Perfil]);
  }
  public function update(Perfilrequest $request)
  {
     $PerfilEmpresa = Perfil_Empresa::where('id_usuario',Auth::id())->first();
// $PerfilEmpresa=$request;
$PerfilEmpresa->nombre_empresa=Str::upper($request->nombre_empresa);
$user =User::where('id_usuario',Auth::id())->first();
$user->slug_empresa=Str::slug($request->nombre_empresa.' '.Auth::id());
$PerfilEmpresa->slug_empresa=Str::slug($request->nombre_empresa.' '.Auth::id());

$PerfilEmpresa->tipo_empresa=Str::upper($request->tipo_empresa);
$PerfilEmpresa->giro_empresa=Str::upper($request->giro_empresa);
$PerfilEmpresa->servicio_empresa=Str::upper($request->servicio_empresa);
$PerfilEmpresa->producto_empresa=Str::upper($request->producto_empresa);
$PerfilEmpresa->telefono_fijo_empresa=$request->telefono_fijo_empresa;
$PerfilEmpresa->horario_atencion=Str::upper($request->horario_atencion);
$PerfilEmpresa->correo_electronico_empresa=$request->correo_electronico_empresa;
$PerfilEmpresa->direccion_empresa=$request->direccion_empresa;
$PerfilEmpresa->red_social_twitter_empresa=$request->red_social_twitter_empresa;
$PerfilEmpresa->red_social_facebook_empresa=$request->red_social_facebook_empresa;
$PerfilEmpresa->pag_web_empresa=$request->pag_web_empresa;

$PerfilEmpresa->slug_empresa = Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
$perfilU =User::where('id_usuario',Auth::id())->first();
if($perfilU->tipo_usuario=="asociado"){
$PerfilEmpresa->descripcion=Str::upper($request->descripcion);
}
$perfilU->slug_empresa=Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
$perfilU->save();
$user->save();
$PerfilEmpresa->save();
     $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
      return redirect('PerfilEmpresa/'.$PerfilEmpresa->slug_empresa);
  }


  public function store(Request $request)
{
      return view('form.campo')->with('dato', $request);
  }



  public function edit(Request $request)
  {
    if ($request->ajax())
      {

$perfilE =Perfil_Empresa::where('id_usuario',Auth::id())->first();
          // $perfilE = Perfil_Empresa::FindOrFail($id);

            Storage::delete(str_replace("/storage", "public", $perfilE->logo_empresa));

            $perfilE->logo_empresa=$request->dato;
            $result=$perfilE->save();





          if ($result){
return response()->json(['success'=>'true']);
              // return view('form.dato')->with('dato', $request);
          }
          //else
          //{
            //return response()->json(['success'=>'false']);
          //}
      }

  }

}
