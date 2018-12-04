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

        $imagenesCount = Imagenes::where('id_album', $request->id_album)->count();
        if ($imagenesCount <= 9) {
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
            return response()->json(['error' => 0,"message" => 'Imagenes almacenadas!', "imagenes" => $data], Response::HTTP_CREATED);
        } else {
            return response()->json(['error' => 1,'message' => 'Solo se pueden 10 imagenes por album!'], Response::HTTP_OK);
        }
    }

    public function show(Imagenes $imagen) {

    }

    public function destroy($id)
    {
        $imagen = Imagenes::where('id_imagen', $id)->first();
        Storage::delete(str_replace("/storage", "public", $imagen->direccion));
        $imagen->delete();
        return  response()->json(['message' => "Imagen eliminada correctament!"], Response::HTTP_OK);
    }
}
