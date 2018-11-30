<?php

namespace ComunidadAEI\Http\Controllers;

use Redirect;
use ComunidadAEI\User;
use ComunidadAEI\Perfil_Empresa;
use ComunidadAEI\Perfil_Usuario;
use ComunidadAEI\Traits\UploadImage;
use ComunidadAEI\Http\Requests\PerfilRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PerfilEmpresaController extends Controller
{
    use UploadImage;

    private  $view = "perfiles.empresa";

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $perfilEmpresa = auth()->user()->empresa()->first();
        // $Perfil = Perfil_Usuario::where('id_usuario',Auth::id())->first();
        // return view("{$this->view}.index")->with([
        //     'perfilE'=>$perfilEmpresa,
        //     'perfil'=>$Perfil]);
        return view("{$this->view}.index", compact('perfilEmpresa'));
    }

    public function show(Perfil_Empresa $perfilEmpresa)
    {
        // $perfilEmpresa = auth()->user()->empresa()->first();
        // $PerfilEmpresa = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
        $perfil = Perfil_Usuario::where('id_usuario', $perfilEmpresa->id_usuario)->first();
        // $Perfil =
        // dd($perfilEmpresa);

        return view("{$this->view}.show")->with([
            'perfilEmpresa'=>$perfilEmpresa,
            'perfil' => $perfil
        ]);
        // return view("{$this->view}.show");
    }

    public function update(PerfilRequest $request, Perfil_Empresa $perfilEmpresa)
    {
        $perfilEmpresa->fill($request->except('servicio_empresa', 'producto_empresa'));
        $perfilEmpresa->servicio_empresa = $request->has('servicio_empresa') ? 1 : 0;
        $perfilEmpresa->producto_empresa = $request->has('producto_empresa') ? 1 : 0;
        $perfilEmpresa->save();
        // dd($perfilEmpresa);
        // $perfilEmpresa->fill($request->all());
        // $PerfilEmpresa = Perfil_Empresa::where('id_usuario',Auth::id())->first();
        // $PerfilEmpresa->nombre_empresa=Str::upper($request->nombre_empresa);
        // $user =User::where('id_usuario',Auth::id())->first();
        // $user->slug_empresa=Str::slug($request->nombre_empresa.' '.Auth::id());
        // $PerfilEmpresa->slug_empresa=Str::slug($request->nombre_empresa.' '.Auth::id());
        // $PerfilEmpresa->tipo_empresa=Str::upper($request->tipo_empresa);
        // $PerfilEmpresa->giro_empresa=Str::upper($request->giro_empresa);
        // $PerfilEmpresa->telefono_fijo_empresa=$request->telefono_fijo_empresa;
        // $PerfilEmpresa->horario_atencion=Str::upper($request->horario_atencion);
        // $PerfilEmpresa->correo_electronico_empresa=$request->correo_electronico_empresa;
        // $PerfilEmpresa->direccion_empresa=$request->direccion_empresa;
        // $PerfilEmpresa->red_social_twitter_empresa=$request->red_social_twitter_empresa;
        // $PerfilEmpresa->red_social_facebook_empresa=$request->red_social_facebook_empresa;
        // $PerfilEmpresa->pag_web_empresa=$request->pag_web_empresa;
        //
        // $PerfilEmpresa->slug_empresa = Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
        // $perfilU =User::where('id_usuario',Auth::id())->first();
        // if($perfilU->tipo_usuario=="Asociado"){
        //     $PerfilEmpresa->descripcion=Str::upper($request->descripcion);
        // }
        // $perfilU->slug_empresa=Str::slug(Str::upper($request->nombre_empresa.' '.Auth::id()));
        //
        // if (strcmp($request->oferta, 'productos') == 0) {
        //     $PerfilEmpresa->producto_empresa = 1;
        //     $PerfilEmpresa->servicio_empresa = 0;
        // } else if (strcmp($request->oferta, 'servicios') == 0) {
        //     $PerfilEmpresa->producto_empresa = 0;
        //     $PerfilEmpresa->servicio_empresa = 1;
        // } else if (strcmp($request->oferta, 'ambos') == 0) {
        //     $PerfilEmpresa->servicio_empresa = 1;
        //     $PerfilEmpresa->producto_empresa = 1;
        // }
        //
        // $perfilU->save();
        // $perfilEmpresa->save();
        // $user->save();
        // $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
        // return redirect()->route("{$this->view}.index");
        // return strcmp($request->oferta, "servicio");
        return redirect()->back()->with('info', 'Datos acualizados correctamente!');
    }


    public function store(Request $request)
    {
        return view('form.campo')->with('dato', $request);
    }



    public function edit(Perfil_Empresa $perfilEmpresa)
    {
        if($perfilEmpresa->id_usuario == auth()->user()->id_usuario) {
            return view('perfiles.empresa.edit', compact('perfilEmpresa'));
        } else {
            return view('errors.404');
        }
    }

    public function saveImage(PerfilRequest $request, Perfil_Empresa $perfil_empresa) {
        if ($request->ajax()) {
            $data = $request->logo_empresa;
            Storage::delete($perfil_empresa->logo_empresa);
            $perfil_empresa->logo_empresa = '/' . $this->getImagePNG('storage/imagen_empresa/', $data);
            $perfil_empresa->save();
            return response()->json("¡Logotipo actualizado correctamente!", Response::HTTP_OK);
        }
    }

}
