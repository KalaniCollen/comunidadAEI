<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
