<?php

namespace ComunidadAEI\Http\Controllers;

use Illuminate\Http\Request;
use ComunidadAEI\Videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    private $url = "multimedia.videos";

    public function index()
    {
        return view("multimedia.videos.VideosAlbum");
    }

    public function show($id_usuario)
    {
        $Videos = Videos::where('id_usuario',$id_usuario)->where('tipo','enlace')->get();

        return view('multimedia.video.Videos')->with('Videos', $Videos);
    }

    public function mostrar($id_usuario)
    {
        $Videos = Videos::where('id_usuario',$id_usuario)->where('tipo','Video')->get();
        $Video = Videos::where('id_usuario',$id_usuario)->where('tipo','Video')->get();
        return view('multimedia.videos.VideoSubidos')->with(['Videos'=> $Videos,'video'=>$Video]);
    }

    public function subir(Request $request ){

        if ($request->ajax())
        {
            try {

                if($request->hasFile('qqfile')){
                    $Videos =$request->file('qqfile')->store('public/videos');
                    $videos = str_replace("public", "/storage", $Videos);

                    Videos::create([

                        'enlace' =>$videos,
                        // 'slug_album'=>Str::slug(Str::upper($request->nombre.' '.time())),
                        'id_usuario'=>Auth::id(),
                        'tipo'=>'Video',
                    ]);


                    //    $Galeria = Imagenes::where('id_album',$Album->id_album)->first();
                    // $Galeria->direccion= $request->file('qqfile')->store('public/galeria/'.$slug_album);
                    // $Galeria->id_album=$Album->id_album;
                    // $Galeria->save();
                    // return  response()->json("true")
                    return response(["success"=>true], 200)
                    ->header('Content-Type', 'text/plain');
                }

            } catch (Exception $e) {
                dd($e);


            }

        }
    }
    public function create(Request $request)
    {
        // $Videos = Videos::where('id_usuario',$id_usuario)->first();
        if ($request->ajax())
        {

            $Album=Videos::create([
                'enlace' => $request->nombre,
                'codigo'=>str_replace("https://www.youtube.com/watch?v=", "", $request->nombre),
                'id_usuario'=>Auth::id(),
                'tipo'=>"enlace",
            ]);

            return  response()->json("ok");
        }

        return view('multimedia.videos.Videos')->with('Videos', $Videos);
    }
    public function Delete(Request $request)
    {
        // $Videos = Videos::where('id_usuario',$id_usuario)->first();
        if ($request->ajax())
        {
            $Videos = Videos::where('id_video',$request->video)->where('id_usuario',Auth::id())->first();
            if($Videos->tipo=="Video"){
                Storage::delete(str_replace("/storage", "public", $Videos->enlace));
            }
            $Videos->delete();
            return  response()->json("ok");
        }

        return view('multimedia.videos.Videos')->with('Videos', $Videos);
    }
}
