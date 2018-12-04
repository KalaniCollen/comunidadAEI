<?php

namespace ComunidadAEI\Http\Controllers;

use ComunidadAEI\BolsaDeTrabajo;
use Illuminate\Http\Request;

class BolsaDeTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bolsas=BolsaDeTrabajo::all();
        return view('bolsa-trabajo.index')->with('bolsas', $bolsas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

        return view('Admin.bolsa-trabajo.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        BolsaDeTrabajo::create([
            'nombre'=>$request->name,
            'empresa'=>$request->empresa,
            'salario'=>$request->salario,
            'descripcion'=>$request->descripcion,
            'direccion'=>$request->direccion,
            'telefono'=>$request->telefono,
        ]);
            return redirect('/Admin');
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
        $bolsas=BolsaDeTrabajo::all();
        return view('Admin.bolsa-trabajo.lista')->with('bolsas', $bolsas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \ComunidadAEI\BolsaDeTrabajo  $bolsaDeTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(BolsaDeTrabajo $bolsaDeTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ComunidadAEI\BolsaDeTrabajo  $bolsaDeTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(BolsaDeTrabajo $bolsaDeTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ComunidadAEI\BolsaDeTrabajo  $bolsaDeTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BolsaDeTrabajo $bolsaDeTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ComunidadAEI\BolsaDeTrabajo  $bolsaDeTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $bolsaDeTrabajo)
    {
        $trabajo=BolsaDeTrabajo::where('id_trabajo',$bolsaDeTrabajo)->first();
        $trabajo->delete();
        return redirect()->route('store-trabajo');
    }
}
