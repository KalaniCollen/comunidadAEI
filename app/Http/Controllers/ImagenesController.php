<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Imagenes;
use ComunidadAEI\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    public function index(Response $response) {
        $imagenes = Imagenes::all();
        return response()->json($imagenes, Response::HTTP_OK);
    }

    public function store(Request $request) {
        $photos = $request->file('file');
        $data = [];
        if (!is_null($photos)) {
            foreach ($photos as $photo) {
                $imagen = new Imagenes;
                $pathImage = Storage::putFile("public/galeria/{$request->slug_album}", $photo);
                $imagen->direccion = Storage::url($pathImage);
                $imagen->id_album = $request->id_album;
                $imagen->save();
                array_push($data, $imagen);
            }
        }
        return response()->json(["message" => 'Imagenes almacenadas!', "imagenes" => $data], Response::HTTP_OK);
    }

    public function show(Imagenes $imagen) {

    }

    public function destroy(Imagenes $imagen)
    {
        // if ($request->ajax())
        // {
        //     $Album=Album::where('slug_album',$request->album)->where('id_usuario',Auth::id())->first();
        //     $imagen=Imagenes::where('id_album',$Album->id_album)->where('id_imagen',$request->imagen)->first();
        //     Storage::delete(str_replace("/storage", "public", $imagen->direccion));
        //     $imagen->delete();
        //     return  response()->json("ok");
        // }
    }
}
