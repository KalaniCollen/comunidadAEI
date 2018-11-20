<?php

namespace App\Http\Controllers;

use Auth;
use App\Album;
use App\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::where('id_usuario', Auth::id())->get();
        return view('multimedia.album.index')->with('albums', $albums);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $album = new Album();
            $album->nombre = $request->nombre;
            $album->slug_album = str_slug( $request->nombre . '-' . time() );
            $album->id_usuario = Auth::user()->id_usuario;
            $album->save();
            $folder = "/public/galeria/{$album->slug_album}";
            File::makeDirectory("storage/galeria/{$album->slug_album}", 0777, true);
            return response()->json([
                "message" => "Album creado"
            ]);
        }
    }

    public function show(Album $album) {
        if (Auth::user()->id_usuario == $album->id_usuario) {
            return view('multimedia.album.veralbum', compact('album'));
        } else {
            return view('errors.404');
        }
    }

    public function destroy(Album $album) {
        $tmp = $album->nombre;
        $album->delete();
        return response()->json("¡Album eliminado! {$tmp}", Response::HTTP_OK);
    }

    public function update(Request $request, Album $album) {
        $album->fill($request->all());
        $album->save();
        return response()->json("¡Album actualizado!", Response::HTTP_OK);
    }

    public function addImage(Request $request) {
        $data = $request->file('file');
        return response()->json($data, Response::HTTP_OK);
    }
}
