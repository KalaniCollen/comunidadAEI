<?php

namespace App\Http\Controllers;

use Auth;
use App\Productos;
use App\Http\Requests\StoreProductosRequest;
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
            $producto->imagen = 'defaultProduct.jpg';
        }
        $producto->id_empresa = Auth::user()->empresa->id_empresa;
        $producto->slug = Str::slug( $producto->nombre . $producto->id_empresa );
        $producto->save();

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $producto)
    {
        return view('catalogo.productos.show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
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
        $producto->fill($request->except('id_empresa','imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            Storage::delete("public/catalogos_img/{$producto->imagen}");
            $imagen = Storage::putFile('public/catalogos_img', $request->file('imagen'));
            $producto->imagen = basename($imagen);
        }
        $producto->id_empresa = Auth::user()->empresa->id_empresa;
        $producto->id_empresa = Auth::user()->empresa->id_empresa;
        $producto->slug = Str::slug($producto->nombre);
        $producto->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $producto = Productos::where('slug', $slug)->delete();
        return redirect()->route('catalogo.index');
    }

    public function api(Request $request) {
        $productos = Productos::all();
        $productos->each(function ($producto) {
            $producto->empresa;
        });
        return response()->json($productos, Response::HTTP_OK);
    }
}
