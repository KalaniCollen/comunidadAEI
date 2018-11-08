<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    public function show($Id_Usuario)
    {
        $Videos = Videos::where('Id_Usuario',$Id_Usuario)->get();

        return view('multimedia.Videos')->with('Videos', $Videos);
    }

    public function create(Request $request)
    {
        // $Videos = Videos::where('Id_Usuario',$Id_Usuario)->first();
        if ($request->ajax())
        {
            $Album=Videos::create([
                'Enlace' => $request->Nombre,
                'Codigo'=>str_replace("https://www.youtube.com/watch?v=", "", $request->Nombre),
                'Id_Usuario'=>Auth::id(),
            ]);

            return response()->json("ok");
        }

        return view('multimedia.Videos')->with('Videos', $Videos);
    }


    public function delete(Request $request)
    {
        if ( $request->ajax() ) {
            $Videos = Videos::where('Id_Video',$request->video)->where('Id_Usuario',Auth::id())->first();
            $Videos->delete();
            return  response()->json("ok");
        }

        return view('multimedia.Videos')->with('Videos', $Videos);
    }
}
