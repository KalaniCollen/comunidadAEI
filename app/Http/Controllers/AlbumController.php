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
        return view('multimedia.album.index')->with('Album', $albums);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $album = new Album();
            $album->nombre = $request->nombre;
            $album->slug_album = str_slug( $request->nombre . '-' . time() );
            $album->id_usuario = Auth::user()->id_usuario;
            $album->save();
            return response()->json([
                "message" => "Album creado"
            ]);
        }
    }

    public function show(Album $Album) {
        if (Auth::user()->id_usuario == $Album->id_usuario) {
            return view('multimedia.album.veralbum', compact('Album'));
        } else {
            return view('errors.404');
        }
    }

    public function destroy(Album $album) {
        $tmp = $album->nombre;
        $album->delete();
        return response()->json("¡Album eliminado! {$tmp}", Response::HTTP_OK);
    }

    // public function show($slug_album)
    // {
    //     $Album = Album::where('slug_album',$slug_album)->first();
    //     $Galeria = Imagenes::where('id_album',$Album->id_album)->get();
    //
    //     return view('multimedia.album.veralbum',[
    //         'Album'=>$Album,
    //         'Galeria'=> $Galeria
    //     ]);
    // }
    // public function edit($id)
    // {
    //     $Album = Album::find($id);
    //     return response()->json($Album);
    // }
    //
    // public function update(Request $request)
    // {
    //
    //     if ($request->ajax())
    //     {
    //         $slug_album=Str::slug(Str::upper($request->name.' '.time()));
    //         $Album =   Album::where('id_album',$request->id)->where('id_usuario',Auth::id())->first();
    //
    //         File::makeDirectory('storage/galeria/'.$slug_album,0777,true);
    //         $Imagenes = Imagenes::where('id_album',$request->id)->get();
    //         foreach ($Imagenes as $key => $imagen) {
    //             $NuevoAlbum = str_replace("/storage/galeria/".$Album->slug_album,"",$imagen->direccion);
    //             File::move("storage/galeria/".$Album->slug_album.''.$NuevoAlbum, "storage/galeria/".$slug_album.'/'.$NuevoAlbum);
    //             $imagen->direccion="storage/galeria/".$slug_album."".$NuevoAlbum;
    //             $imagen->save();
    //         }
    //         File::deleteDirectory("storage/galeria/".$Album->slug_album);
    //         $Album->nombre=$request->name;
    //         $Album->slug_album=$slug_album;
    //
    //
    //         $result = $Album->save();
    //         //Actualizar el nombre de carpeta
    //         if ($result){
    //             return response()->json(['success'=>'true']);
    //         }
    //         else
    //         {
    //             return response()->json(['success'=>'false']);
    //         }
    //     }
    //
    //
    // }

    // public function store(Request $request,$slug_album)
    // {
    //     if ($request->ajax())
    //     {
    //         try {
    //             // Validate the value...
    //
    //             // dd($request);
    //             $Album = Album::where('slug_album',$slug_album)->first();
    //             // dd($request->qqfile);
    //             if($request->hasFile('qqfile')){
    //                 $imagen =$request->file('qqfile')->store('public/galeria/'.$slug_album);
    //                 $imagen = str_replace("public", "/storage", $imagen);
    //
    //                 Imagenes::create([
    //
    //                     'direccion' =>$imagen,
    //                     // 'slug_album'=>Str::slug(Str::upper($request->nombre.' '.time())),
    //                     'id_album'=>$Album->id_album,
    //                 ]);
    //
    //                 //    $Galeria = Imagenes::where('id_album',$Album->id_album)->first();
    //                 // $Galeria->direccion= $request->file('qqfile')->store('public/galeria/'.$slug_album);
    //                 // $Galeria->id_album=$Album->id_album;
    //                 // $Galeria->save();
    //                 // return  response()->json("true")
    //                 return response(["success"=>true], 200)
    //                 ->header('Content-Type', 'text/plain');
    //             }
    //
    //         } catch (Exception $e) {
    //             dd($e);
    //
    //
    //         }
    //
    //     }
    //
    //     // $Album = Album::where('id_usuario',$id_usuario)->first();
    //
    // }
    // public function delete($id)
    // {
    //     $Album = Album::where('id_album',$id)->where('id_usuario',Auth::id())->first();
    //     File::deleteDirectory("storage/galeria/".$Album->slug_album);
    //     // Storage::delete("/");
    //     //eliminar carpeta
    //     $result = $Album->delete();
    //
    //
    //
    //     if ($result)
    //     {
    //         return response()->json(['success'=>'true']);
    //     }
    //     else
    //     {
    //         return response()->json(['success'=> 'false']);
    //     }
    //
    // }
}
