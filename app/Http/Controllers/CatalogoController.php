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
        $productos = Productos::where('id_usuario', Auth::user()->id_usuario)->get();
        $servicios = Servicios::where('id_usuario', Auth::user()->id_usuario)->get();
        return view('catalogo.index', compact('productos', 'servicios'));
    }
}
