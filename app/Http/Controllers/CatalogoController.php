<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Productos;
use App\Servicios;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::where('id_user', Auth::user()->id)->get();
        $servicios = Servicios::where('id_user', Auth::user()->id)->get();
        return view('catalogo.index', compact('productos', 'servicios'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('catalogo.create');
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Catalogo  $catalogo
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Catalogo $catalogo)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Catalogo  $catalogo
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Catalogo $catalogo)
    // {
    //     //
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Catalogo  $catalogo
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Catalogo $catalogo)
    // {
    //     //
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Catalogo  $catalogo
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Catalogo $catalogo)
    // {
    //     //
    // }
}
