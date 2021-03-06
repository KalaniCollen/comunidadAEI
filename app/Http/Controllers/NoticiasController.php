<?php

namespace ComunidadAEI\Http\Controllers;

use ComunidadAEI\Noticias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('noticias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \ComunidadAEI\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(Noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ComunidadAEI\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticias $noticias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ComunidadAEI\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticias $noticias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ComunidadAEI\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticias $noticias)
    {
        //
    }

    public function api(Request $request) {
        $noticias = Noticias::all();
        return response($noticias->jsonSerialize(), Response::HTTP_OK);

    }
}
