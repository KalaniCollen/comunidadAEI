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
        return view("{$this->view}.index", compact('perfilEmpresa'));
    }

    public function show(Perfil_Empresa $perfilEmpresa)
    {
        $perfil = Perfil_Usuario::where('id_usuario', $perfilEmpresa->id_usuario)->first();
        return view("{$this->view}.show")->with([
            'perfilEmpresa'=>$perfilEmpresa,
            'perfil' => $perfil
        ]);
    }

    public function update(PerfilRequest $request, Perfil_Empresa $perfilEmpresa)
    {
        $this->authorize('update', $perfilEmpresa);
        $newSlug = str_slug($request->nombre_empresa . ' ' . Auth::user()->id_usuario);
        $perfilEmpresa->fill($request->except('servicio_empresa', 'producto_empresa', 'slug_empresa'));
        $perfilEmpresa->servicio_empresa = $request->has('servicio_empresa') ? 1 : 0;
        $perfilEmpresa->producto_empresa = $request->has('producto_empresa') ? 1 : 0;
        $perfilEmpresa->slug_empresa = $newSlug;
        $perfilEmpresa->save();
        return redirect()->route('perfil-empresa.edit', $newSlug)->with('info', 'Datos acualizados correctamente!');
    }


    public function store(Request $request)
    {
        return view('form.campo')->with('dato', $request);
    }



    public function edit(Perfil_Empresa $perfilEmpresa)
    {
        $this->authorize('view', $perfilEmpresa);
        return view('perfiles.empresa.edit', compact('perfilEmpresa'));
    }

    public function saveImage(PerfilRequest $request, Perfil_Empresa $perfil_empresa) {
        $oldImage = ltrim($perfil_empresa->logo_empresa, '/storage');
        $oldImage = "/public/{$oldImage}";
        Storage::delete($oldImage);
        if ($request->ajax()) {
            $data = $request->imagen;
            $perfil_empresa->logo_empresa = '/' . $this->getImagePNG('storage/imagen_empresa/', $data);
            $perfil_empresa->save();
            return response()->json("¡Logotipo actualizado correctamente!", Response::HTTP_OK);
        }
    }

}
