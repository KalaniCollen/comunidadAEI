<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Storage;



use App\Perfil_Empresa;
class MisLogrosController extends Controller
{

  public function Index($slug_empresa)
  {
     $perfilU = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();

      return view('Perfiles.Logros.Mis_Logros')->with('MisLogros',$perfilU);
  }
  public function store(Request $request)
  {
      return view('form.campo')->with('dato', $request);
  }
   //
   public function edit($slug_empresa)
   {
       $perfilU = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
        return view('Perfiles.Logros.EditarMis_Logros')->with('MisLogros',$perfilU);
   }
   public function update(Request $request)
   {
       $perfilU = Perfil_Empresa::where('id_usuario',Auth::id())->first();
       $perfilU->mis_logros=Str::upper($request->MisLogros);
       if($request->hasFile('img_logros')){
           Storage::delete(str_replace("/storage", "public", $perfilU->img_logros));
     $img_logros= $request->file('img_logros')->store('public/logros_img');
     $perfilU->img_logros=str_replace("public","/storage",$img_logros);

        }
 $perfilU->save();
        return redirect('MisLogros/'.$perfilU->slug_empresa);
   }

}
