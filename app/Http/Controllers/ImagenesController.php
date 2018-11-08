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
        $Album=Album::where('slug_album',$request->album)->where('id_usuario',Auth::id())->first();


        // dd(str_replace("/storage", "public", $imagen->direccion));
        Storage::delete(str_replace("/storage", "public", $imagen->direccion));

    $imagen->delete();
      return  response()->json("ok");




              }
}
}
