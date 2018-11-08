<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Perfil_Empresa;
class MisLogrosController extends Controller
{
    public function MostrarMisLogros($Id_Usuario)
    {
        $perfilU = Perfil_Empresa::where('Id_Usuario',$Id_Usuario)->first();

        return view('Perfiles.Mis_Logros')->with('MisLogros',$perfilU);
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


            $perfilU = Perfil_Empresa::FindOrFail($id);

            $result = $perfilU->fill($datos)->save();


            if ($result){
                $request['mensaje']="El dato ha sido actualizado";
                //return Response::json($request->dato);
                return response()->json([
                    'data' => $request->dato,
                ]);
            }
            //else
            //{
            //return response()->json(['success'=>'false']);
            //}
        }

    }
}
