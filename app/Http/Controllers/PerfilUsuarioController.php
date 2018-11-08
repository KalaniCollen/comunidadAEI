<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil_Usuario;
use App\Perfil_Empresa;
use App\User;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;

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
        if($request->name=="Sexo"){
            return view('form.Sexo')->with('dato', $request);
        }

        if($request->name=="Telefono_Movil"){
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
            if($request->name=='name' or $request->name=='Apellido_Materno' or $request->name=='Apellido_Paterno'){
                $datos[$dato['name']] =Str::upper(Input::get('dato'));
                $request['dato'] =Str::upper(Input::get('dato'));
            }
            else{
                $datos[$dato['name']] =$request->dato;
            }
            if($request->tabla=="perfil"){

                $perfil = Perfil_Usuario::FindOrFail($id);
                if($request->name=="Imagen"){
                    $perfil->Imagen=$request->dato;
                    $perfil->save();
                }
                if($request->name=="Privacidad"){
                    $perfil->Privacidad=$request->dato;
                    $perfil->save();
                }

                $result = $perfil->fill($datos)->save();

            }
            else{
                $user = User::FindOrFail($id);

                $result = $user->fill($datos)->save();
                $user = User::FindOrFail($id);
                if($request->name=="name" or  $request->name=="Apellido_Materno" or $request->name=="Apellido_Paterno"){
                    $user->Slug_Usuario=Str::slug($user->name.' '.$user->Apellido_Paterno.' '.$user->Apellido_Materno.' '.$id);
                    $user->save();
                    $perfilee=Perfil_Usuario::where('Id_Usuario',$id)->first();

                    $perfilee->Slug_Usuario=$user->Slug_Usuario;
                    $perfilee->save();
                    return response()->json($user->Slug_Usuario);
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
        $perfil = Perfil_Usuario::where('Slug_Usuario',$slug)->first();
        $perfilE = Perfil_Empresa::where('Id_Usuario',$perfil->Id_Usuario)->first();
        $User = User::where('Id_Usuario',$perfil->Id_Usuario)->first();
        //       $perfil=Perfil_Usuario::find($Id_Usuario)->first();
        //    dd($perfil->Telefono_Fijo);
        //$perfil=Perfil_Usuario::all()->first();

        return view('Perfiles.perfil',[
            'perfil'=>$perfil,
            'perfilE'=> $perfilE,
            'user' => $User
        ]);
    }
}
