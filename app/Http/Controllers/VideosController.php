<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    public function show($id_usuario)
    {
        $Videos = Videos::where('id_usuario',$id_usuario)->get();

        return view('multimedia.Videos')->with('Videos', $Videos);
    }

    public function create(Request $request)
    {
        // $Videos = Videos::where('id_usuario',$id_usuario)->first();
        if ($request->ajax())
        {
            $Album=Videos::create([
                'Enlace' => $request->Nombre,
                'Codigo'=>str_replace("https://www.youtube.com/watch?v=", "", $request->Nombre),
                'id_usuario'=>Auth::id(),
            ]);

            return response()->json("ok");
        }

        return view('multimedia.Videos')->with('Videos', $Videos);
    }


    public function delete(Request $request)
    {
        if ( $request->ajax() ) {
            $Videos = Videos::where('Id_Video',$request->video)->where('id_usuario',Auth::id())->first();
            $Videos->delete();
            return  response()->json("ok");
        }

        return view('multimedia.Videos')->with('Videos', $Videos);
    }
}
