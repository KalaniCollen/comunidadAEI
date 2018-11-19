<?php

namespace App\Http\Controllers;

use App\User;
use App\Perfil_Empresa;
use App\Perfil_Usuario;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PerfilEmpresaController extends Controller
{

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $perfilEmpresa = Auth::user()->empresa()->first();
            $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
        return view('perfiles.empresa.index')->with([
            'perfilE'=>$perfilEmpresa,
            'perfil'=>$Perfil]);
    }

    public function show($slug_empresa)
    {
        $perfilEmpresa = Auth::user()->empresa()->first();
        // $PerfilEmpresa = Perfil_Empresa::where('slug_empresa',$slug_empresa)->first();
        $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
        return view('perfiles.Empresa.EditarPerfilEmpresa')->with([
            'perfilE'=>$perfilEmpresa,
            'perfil'=>$Perfil]);
    }

    public function update(PerfilRequest $request, Perfil_Empresa $perfilEmpresa)
    {
        $perfilEmpresa->fill($request->all());
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
        $perfilEmpresa->save();
        // $user->save();
        // $Perfil=Perfil_Usuario::where('id_usuario',Auth::id())->first();
        return redirect()->route('perfil-empresa.index');
        // return strcmp($request->oferta, "servicio");
    }


    public function store(Request $request)
    {
        return view('form.campo')->with('dato', $request);
    }



    public function edit(Perfil_Empresa $perfilEmpresa)
    {
        $perfil = Auth::user()->perfil;
        return view('perfiles.Empresa.EditarPerfilEmpresa', [
            'perfil' => $perfil,
            'perfilE' => $perfilEmpresa,
        ]);
    }

}
