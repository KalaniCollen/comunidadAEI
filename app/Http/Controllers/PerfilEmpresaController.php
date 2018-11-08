<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_Empresa;
use App\User;
use Redirect;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;

class PerfilEmpresaController extends Controller
{

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function Show($Slug_Empresa)
    {
        $PerfilEmpresa = Perfil_Empresa::where('Slug_Empresa',$Slug_Empresa)->first();
        return view('Perfiles.PerfilEmpresa')->with('perfilE',$PerfilEmpresa);
    }

    public function store(Request $request)
    {if($request->name=="Tipo_Empresa"){
        return view('form.TipoE')->with('dato', $request);
    }
    if($request->name=="Giro_Empresa"){
        return view('form.Giro')->with('dato', $request);
    }
    if($request->name=="Telefono_Movil_Empresa" or $request->name=="Telefono_Fijo_Empresa" or $request->name=="Cantidad_Productos" or $request->name=="Red_Social_Whatsapp"){
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
        if($request->name=='Correo_Electronico_Empresa' or $request->name=='Red_Social_Instagram' or $request->name=='Red_Social_Twitter_Empresa' or
        $request->name=='Red_Social_Facebook_Empresa' or $request->name=='Pag_Web_Empresa' ){
            $datos[$dato['name']] =$request->dato;
        }
        else{
            $datos[$dato['name']] =Str::upper($request->dato);


        }
        $perfilE =Perfil_Empresa::where('Id_Usuario',$id)->first();
        // $perfilE = Perfil_Empresa::FindOrFail($id);
        if($request->name=="Imagen"){
            $perfilE->Logo_Empresa=$request->dato;
            $perfilE->save();
        }
        if($request->name=="Nombre_Empresa"){
            $perfilE->Nombre_Empresa=Str::upper($request->dato);
            $perfilE->Slug_Empresa = Str::slug($request->dato.' '.$id);
            $perfilU =User::where('Id_Usuario',$id)->first();
            $perfilU->Slug_Empresa=Str::slug($request->dato.' '.$id);
            $perfilU->save();
            $perfilE->save();
            return response()->json($perfilU->Slug_Empresa);
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
