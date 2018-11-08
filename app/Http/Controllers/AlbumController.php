<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Imagenes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;



class AlbumController extends Controller
{

  public function index($id_usuario)
  {
     $Albums = Album::where('id_usuario',$id_usuario)->get();


      return view('multimedia.album')->with('Album', $Albums);
  }
  public function create(Request $request)
  {
    if ($request->ajax())
      {

        $Album=Album::create([
          'nombre' => Str::upper($request->nombre),
          'slug_album'=>Str::slug(Str::upper($request->nombre.' '.time())),
          'id_usuario'=>Auth::id(),
        ]);
        $directory="public/Galeria/".$Album->slug_album;

        $dd=File::makeDirectory($directory,0777,true);
        // $albums =store('public/Galeria/'.$Album->nombre);
        return  response()->json("ok");
      }
     // $Album = Album::where('id_usuario',$id_usuario)->first();

      return view('multimedia.album')->with('Album',$Album);
  }
  public function Show($slug_album)
  {
    $Album = Album::where('slug_album',$slug_album)->first();
     $Galeria = Imagenes::where('id_album',$Album->id_album)->get();

     return view('multimedia.veralbum',[
       'Album'=>$Album,
       'Galeria'=> $Galeria
     ]);
   }
   public function Edit($id)
   {
     $Album = Album::find($id);
     return response()->json($Album);

    }
    public function update(Request $request)
    {

        if ($request->ajax())
        {

          $slug_album=Str::slug(Str::upper($request->name.' '.time()));
            $Album =   Album::where('id_album',$request->id)->where('id_usuario',Auth::id())->first();

            File::makeDirectory('public/galeria/'.$slug_album,0777,true);
              $Imagenes = Imagenes::where('id_album',$request->id)->get();
              foreach ($Imagenes as $key => $imagen) {
                 $NuevoAlbum = str_replace("/storage/galeria/".$Album->slug_album,"",$imagen->direccion);
                File::move("public/galeria/".$Album->slug_album.'/'.$NuevoAlbum, "public/galeria/".$slug_album.'/'.$NuevoAlbum);
                $imagen->direccion="/storage/galeria/".$slug_album."/".$NuevoAlbum;
                $imagen->save();
              }
              File::deleteDirectory("public/galeria/".$Album->slug_album);
              $Album->nombre=$request->name;
              $Album->slug_album=$slug_album;


                  $result = $Album->save();
//Actualizar el nombre de carpeta
            if ($result){
                return response()->json(['success'=>'true']);
            }
            else
            {
              return response()->json(['success'=>'false']);
            }
        }



    }

   public function Agregar(Request $request,$slug_album)
   {
     if ($request->ajax())
       {
         try {
                 // Validate the value...

         // dd($request);
        $Album = Album::where('slug_album',$slug_album)->first();
// dd($request->qqfile);
        if($request->hasFile('qqfile')){
          $imagen =$request->file('qqfile')->store('public/galeria/'.$slug_album);
          $imagen = str_replace("public", "/storage", $imagen);

          Imagenes::create([

            'direccion' =>$imagen,
            // 'slug_album'=>Str::slug(Str::upper($request->nombre.' '.time())),
            'id_album'=>$Album->id_album,
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

      // $Album = Album::where('id_usuario',$id_usuario)->first();

   }
   public function delete($id)
   {
     $Album = Album::where('id_album',$id)->where('id_usuario',Auth::id())->first();
     $Imagenes=Imagenes::where('id_album',$Album->id_album)->get();
     foreach ($Imagenes as $key => $imagen) {
       // Storage::delete(str_replace("/storage", "public", $imagen->direccion));
       $imagen->delete();
     }
 Storage::deleteDirectory("public/galeria/".$Album->slug_album);
     // Storage::delete("/");
     //eliminar carpeta
     $result = $Album->delete();



     if ($result)
     {
         return response()->json(['success'=>'true']);
     }
     else
     {
         return response()->json(['success'=> 'false']);
     }


    }
}
