<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Album;
use ComunidadAEI\Imagenes;
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
        $albums->each(function ($album) {
            $album->imagenes;
        });
        return response()->json($albums, Response::HTTP_OK);
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
            Storage::makeDirectory("public/galeria/{$album->slug_album}");
            return response()->json([
                "message" => "Album {$album->nombre} creado!",
                "album" => $album
            ], Response::HTTP_CREATED);
        }
    }

    public function show(Album $album) {
        if (Auth::user()->id_usuario == $album->id_usuario) {
            $imagenes = $album->imagenes;
            return view('multimedia.album.show', compact('album', 'imagenes'));
        } else {
            return view('errors.404');
        }
    }

    public function destroy(Album $album) {
        $tmp = $album->nombre;
        $album->imagenes()->forceDelete();
        $album->delete();
        Storage::deleteDirectory("public/galeria/{$album->slug_album}");
        return response()->json([
            "message" => "¡Album " . $tmp .  " eliminado!"
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Album $album) {
        if ($request->ajax()) {
            $album->fill($request->all());
            $album->save();
            return response()->json("¡Album actualizado!", Response::HTTP_OK);
        }
    }

    public function view() {
        return view('multimedia.album.index');
    }
}
