<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
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
           $busqueda = User::search($request->busqueda)->orderBy('id_usuario','desc')->get();
        //    for($i=0;$i<$busqueda;$i++){
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

        // if($request->ajax()){

            $output="";

            // $products=User::where('name','LIKE','%'.$request->search."%")->get();
            $products =User::search($request->busqueda)->orderBy('id_usuario','desc')->get();

            if($products){

              foreach ($products as $key => $product) {
                $output='<tr> <td>'.$product->name.'</td> </tr>';

              }


              return response()->json($output);
            }

//           }
        }
}
