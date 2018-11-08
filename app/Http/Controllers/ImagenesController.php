<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagenes;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Auth;

class ImagenesController extends Controller
{
    public function Delete(Request $request)
    {
        if ($request->ajax())
        {
            $Album=Album::where('Slug_Album',$request->album)->where('id_usuario',Auth::id())->first();
            $Imagen=Imagenes::where('Id_Album',$Album->Id_Album)->where('Id_Imagen',$request->imagen)->first();

            // dd(str_replace("/storage", "public", $Imagen->Direccion));
            Storage::delete(str_replace("/storage", "public", $Imagen->Direccion));

            $Imagen->delete();
            return  response()->json("ok");




        }
    }
}
