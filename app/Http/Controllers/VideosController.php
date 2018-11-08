<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
<<<<<<< HEAD
    public function show($id_usuario)
    {
        $Videos = Videos::where('id_usuario',$id_usuario)->get();
=======
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158

  public function index()
  {

<<<<<<< HEAD
    public function create(Request $request)
    {
        // $Videos = Videos::where('id_usuario',$id_usuario)->first();
        if ($request->ajax())
        {
            $Album=Videos::create([
                'Enlace' => $request->Nombre,
                'Codigo'=>str_replace("https://www.youtube.com/watch?v=", "", $request->Nombre),
                'id_usuario'=>Auth::id(),
            ]);

            return response()->json("ok");
        }

        return view('multimedia.Videos')->with('Videos', $Videos);
    }
=======
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158

      return view('multimedia.VideosAlbum');
  }
  public function show($id_usuario)
  {
     $Videos = Videos::where('id_usuario',$id_usuario)->where('tipo','enlace')->get();

      return view('multimedia.Videos')->with('Videos', $Videos);
  }
  public function mostrar($id_usuario)
  {
     $Videos = Videos::where('id_usuario',$id_usuario)->where('tipo','Video')->get();
$Video = Videos::where('id_usuario',$id_usuario)->where('tipo','Video')->get();
      return view('multimedia.VideoSubidos')->with(['Videos'=> $Videos,'video'=>$Video]);
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

<<<<<<< HEAD
    public function delete(Request $request)
    {
        if ( $request->ajax() ) {
            $Videos = Videos::where('Id_Video',$request->video)->where('id_usuario',Auth::id())->first();
            $Videos->delete();
            return  response()->json("ok");
        }
=======
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

      return view('multimedia.Videos')->with('Videos', $Videos);
  }
  public function Delete(Request $request)
  {
     // $Videos = Videos::where('id_usuario',$id_usuario)->first();
     if ($request->ajax())
       {

    $Videos = Videos::where('slug_usuario',$request->video)->where('id_usuario',Auth::id())->first();
    if($Videos->tipo=="Video"){
        Storage::delete(str_replace("/storage", "public", $Videos->enlace));
>>>>>>> 27670647432db9b2bbc3629bab154ec4abeb3158

    }
$Videos->delete();
         return  response()->json("ok");
       }

      return view('multimedia.Videos')->with('Videos', $Videos);
  }
}
