<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Productos;
use ComunidadAEI\Http\Requests\StoreProductosRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogo.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductosRequest $request)
    {
        $nombreArchivo = null;
        $producto = new Productos();
        $producto->fill($request->except('id_empresa','imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            $imagen = Storage::putFile('public/catalogos_img', $request->file('imagen'));
            $producto->imagen = basename($imagen);
        } else {
            $producto->imagen = 'defaultProduct.jpeg';
        }
        $producto->id_empresa = auth()->user()->empresa->id_empresa;
        $producto->slug = Str::slug( $producto->nombre . $producto->id_empresa );
        $producto->save();

        return redirect()->route('catalogo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $producto)
    {
        return view('catalogo.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
        $this->authorize('view', $producto);
        return view('catalogo.productos.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductosRequest $request, Productos $producto)
    {
        $this->authorize('update', $producto);
        $producto->fill($request->except('imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            if ($producto->imagen != "defaultProduct.jpeg") {
                Storage::delete("public/catalogos_img/{$producto->imagen}");
            }
            $imagen = Storage::putFile('public/catalogos_img', $request->file('imagen'));
            $producto->imagen = basename($imagen);
        }
        $producto->slug = Str::slug($producto->nombre);
        $producto->save();

        return redirect()->route('catalogo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Productos $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $producto)
    {
        $this->authorize('delete', $producto);
        $producto->delete();
        Storage::delete("public/catalogos_img/{$producto->imagen}");
        return redirect()->route('catalogo.index');
    }

    public function api(Request $request) {
        $productos = Productos::orderBy('created_at', 'DESC')->paginate(6);
        $productos->each(function ($producto) {
            $producto->empresa;
        });
        return response()->json($productos, Response::HTTP_OK);
    }
}
