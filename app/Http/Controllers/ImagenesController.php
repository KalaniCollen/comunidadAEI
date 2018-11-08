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
<<<<<<< HEAD
    public function Delete(Request $request)
    {
        if ($request->ajax())
        {
            $Album=Album::where('Slug_Album',$request->album)->where('id_usuario',Auth::id())->first();
            $Imagen=Imagenes::where('Id_Album',$Album->Id_Album)->where('Id_Imagen',$request->imagen)->first();
=======
  public function Delete(Request $request)
  {
    if ($request->ajax())
      {
        $Album=Album::where('slug_album',$request->album)->where('id_usuario',Auth::id())->first();
        $imagen=Imagenes::where('id_album',$Album->id_album)->where('id_imagen',$request->imagen)->first();
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158

        // dd(str_replace("/storage", "public", $imagen->direccion));
        Storage::delete(str_replace("/storage", "public", $imagen->direccion));

    $imagen->delete();
      return  response()->json("ok");




              }
}
}
