<?php

namespace ComunidadAEI\Http\Controllers;

use ComunidadAEI\User;
use ComunidadAEI\Perfil_Empresa;
use ComunidadAEI\Servicios;
use ComunidadAEI\Productos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Response;
use DB;

class BuscadorController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function Ssearch(Request $request)
    {
        // $busque['busc']="Gerardo";
        // dd(Input::get('busqueda'));


        $salida="";
        //    for($i=0;$i<$busqueda;$i++){
        $busqueda = User::search($request->busqueda)->orderBy('id_usuario','desc')->get();
        //   $salida=$salida."".$busqueda[$i]->name;
        // }
        if($busqueda){
            foreach ($busqueda as $key => $busqueda) {
                $salida=$salida."<br>".$busqueda->name;
            }
            // dd($salida);
            return  response()->json($salida);
        }
        // return Response::json($busqueda);

        return  response()->json("No hay resultados");
        // return view('busqueda',['busqueda' => $busqueda]);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request){

        if (strcmp($request->topic, 'empresa') === 0) {
            $busqueda = Perfil_Empresa::search("*{$request->buscar}*")->get();
        }

        if (strcmp($request->topic, 'servicio') === 0) {
            $busqueda = Servicios::search("*{$request->buscar}*")->get();
        }

        if (strcmp($request->topic, 'producto') === 0) {
            $busqueda = Productos::search("*{$request->buscar}*")->get();
        }

        return response()->json($busqueda, Response::HTTP_OK);
    }
}
