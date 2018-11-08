<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/Perfil_Usuario;

class Mis_LogrosController extends Controller
{
  public function MostrarMis_Logros($id_usuario)
  {
     $perfilU = Perfil_Usuario::where('id_usuario',$id_usuario)->first();
      return view('Perfiles.mis_logros')->with('Biografia',$perfilU);
  }
  public function store(Request $request)
  {
      return view('form.campo')->with('dato', $request);
  }
   //
   public function edit(Request $request,$id)
   {
     if ($request->ajax())
       {
         $dato=$request->only('name');
         $datos[$dato['name']] =$request->dato;


           $perfilU = Perfil_Usuario::FindOrFail($id);

           $result = $perfilU->fill($datos)->save();


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
