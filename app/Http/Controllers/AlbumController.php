<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Imagenes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;



class AlbumController extends Controller
{
    public function index($Id_Usuario)
    {
        $Album = Album::where('Id_Usuario',$Id_Usuario)->get();

        return view('multimedia.album')->with('Album',$Album);
    }
    public function create(Request $request)
    {
        if ($request->ajax())
        {

            $Album=Album::create([
                'Nombre' => Str::upper($request->Nombre),
                'Slug_Album'=>Str::slug(Str::upper($request->Nombre.' '.time())),
                'Id_Usuario'=>Auth::id(),
            ]);
            $directory="public/Galeria/".$Album->Slug_Album;
            $dd=Storage::makeDirectory($directory);
            // $albums =store('public/Galeria/'.$Album->Nombre);
            return  response()->json("ok");
        }
        // $Album = Album::where('Id_Usuario',$Id_Usuario)->first();

        return view('multimedia.album')->with('Album',$Album);
    }
    public function Show($Slug_Album)
    {
        $Album = Album::where('Slug_Album',$Slug_Album)->first();
        $Galeria = Imagenes::where('Id_Album',$Album->Id_Album)->get();

        return view('multimedia.veralbum',[
            'Album'=>$Album,
            'Galeria'=> $Galeria
        ]);
    }
    public function Agregar(Request $request,$Slug_Album)
    {
        if ($request->ajax())
        {
            try {
                // Validate the value...

                // dd($request);
                $Album = Album::where('Slug_Album',$Slug_Album)->first();
                // dd($request->qqfile);
                if($request->hasFile('qqfile')){
                    $imagen =$request->file('qqfile')->store('public/galeria/'.$Slug_Album);
                    $imagen = str_replace("public", "/storage", $imagen);

                    Imagenes::create([

                        'Direccion' =>$imagen,
                        // 'Slug_Album'=>Str::slug(Str::upper($request->Nombre.' '.time())),
                        'Id_Album'=>$Album->Id_Album,
                    ]);

                    //    $Galeria = Imagenes::where('Id_Album',$Album->Id_Album)->first();
                    // $Galeria->Direccion= $request->file('qqfile')->store('public/galeria/'.$Slug_Album);
                    // $Galeria->Id_Album=$Album->Id_Album;
                    // $Galeria->save();
                    // return  response()->json("true")
                    return response(["success"=>true], 200)
                    ->header('Content-Type', 'text/plain');
                }

            } catch (Exception $e) {
                dd($e);


            }

        }

        // $Album = Album::where('Id_Usuario',$Id_Usuario)->first();

    }
}
